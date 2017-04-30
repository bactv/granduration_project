<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 9:13 CH
 */
namespace frontend\models;

use common\models\QuizBase;
use frontend\components\Charging;
use yii\db\Query;
use yii\helpers\Url;

class Quiz extends QuizBase
{
    public static function findById($quiz_id)
    {
        $object = Quiz::find()->where(['quiz_id' => $quiz_id, 'status' => 1])->one();
        return $object;
    }

    public static function search_quiz($params = [])
    {
        $results = [];
        $limit = 5;
        $query = Subject::find();
        if (!empty($params['subject_id'])) {
            $query->where(['subject_id' => $params['subject_id']]);
        }
        $subjects = $query->all();

        foreach ($subjects as $sj) {
            $results[$sj['subject_id']] = [];
            $quiz = Quiz::find()->where(['status' => 1, 'subject_id' => $sj['subject_id']]);
            if (!empty($params['class_level_id'])) {
                $quiz->andWhere(['class_level_id' => $params['class_level_id']]);
            }
            if (!empty($params['quiz_type_id'])) {
                $quiz->andWhere(['quiz_type_id' => $params['quiz_type_id']]);
                $limit = '';
            }
            $quiz = $quiz->limit($limit)->orderBy('quiz_type_id ASC')->all();
            foreach ($quiz as $q) {
                $results[$sj['subject_id']][$q['quiz_type_id']][] = $q;
            }
        }
        return $results;
    }

    /**
     * Kiểm tra user được pép làm bài thi trắc nghiêm hay không
     * @param $quiz_id
     * @param null $user_id
     * @return string
     */
    public static function check_user_permission($quiz_id, $user_id = null)
    {
        $quiz = self::findById($quiz_id);
        $user = User::findIdentity($user_id);

        if (empty($quiz)) {
            return json_encode(['status' => 0, 'message' => 'Đề thi không tồn tại.']);
        }

        // nếu bài thi phải trả phí hoặc VIP => cần user đăng nhập và là tài khoản học sinh
        if ($quiz['price'] > 0 || $quiz['vip'] == 1) {
            if (empty($user)) {
                return json_encode(['status' => 0, 'message' => 'Bạn cần <a href="' . Url::toRoute(['/site/login']) . '" target="_blank">đăng nhập</a> để làm bài thi này.']);
            }
            if ($user['type'] == 2) {
                return json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không có quyền để thực hiện bài thi này.']);
            }
        }


        // nếu bài thi VIP => cần tài khoản học sinh VIP
        $student_id = $user['student_id'];
        $check_vip = StudentPackage::check_student_vip($student_id);
        if ($quiz['vip'] == 1 && !$check_vip) {
            return json_encode(['status' => 0, 'message' => 'Đây là đề thi VIP, bạn hãy <a href="' . Url::toRoute(['/account/info']) . '" target="_blank">đăng ký</a> tài khoản VIP để làm bài thi này.']);
        }

        if ($check_vip) {
            return json_encode(['status' => 1, 'message' => 'OK']);
        }

        // nếu không đủ tiền để charge
        $student = Student::findOne(['std_id' => $student_id]);
        if (!$check_vip && ($student['std_balance'] < $quiz['price'])) {
            return json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không đủ để làm bài thi này, hãy <a href="' . Url::toRoute(['/account/info']) . '" target="_blank">nạp tiền</a> vào tài khoản để làm bài thi.']);
        } else {
            // trừ tiền
            $charge = Charging::processCharge($student, 'quiz', (-intval($quiz['price'])));
            if (!$charge) {
                return json_encode(['status' => 0, 'message' => 'Trừ tiền thất bại. Vui lòng thử lại sau.']);
            }
        }
        return json_encode(['status' => 1, 'message' => 'OK']);
    }
}