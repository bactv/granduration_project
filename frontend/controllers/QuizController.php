<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 8:56 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\Quiz;
use frontend\models\StudentPackage;
use Yii;
use frontend\components\FrontendController;
use yii\base\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class QuizController extends Controller
{
    /**
     * List contest
     * @return string
     */
    public function actionListContest()
    {
        $request = Yii::$app->request->get();

        $class_id = isset($request['class_id']) ? $request['class_id'] : 12;
        $subject_id = isset($request['subject_id']) ? $request['subject_id'] : '';
        $quiz_type_id = isset($request['quiz_type_id']) ? $request['quiz_type_id'] : '';

        $results = Quiz::search_quiz([
            'class_id' => $class_id,
            'subject_id' => $subject_id,
            'quiz_type_id' => $quiz_type_id
        ]);

        return $this->render('list_contest_practice', [
            'class_id' => $class_id,
            'subject_id' => $subject_id,
            'quiz_type_id' => $quiz_type_id,
            'results' => $results
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail()
    {
        $request = Yii::$app->request->get();

        $quiz_id = isset($request['id']) ? $request['id'] : '';
        if ($quiz_id == '') {
            throw new NotFoundHttpException("Không tìm thấy trang này.");
        }

        $decrypt = Utility::encrypt_decrypt('decrypt', $quiz_id);
        $ex = explode('_', $decrypt);
        if (!isset($ex[1]) || (!is_numeric($ex[1]))) {
            throw new NotFoundHttpException("Không tìm thấy trang này.");
        }
        $quiz = Quiz::findOne(['quiz_id' => $ex[1], 'status' => 1]);
        if (empty($quiz)) {
            throw new NotFoundHttpException("Không tìm thấy trang này.");
        }

        return $this->render('contest_detail', [
            'quiz' => $quiz
        ]);
    }

    public function actionDoContest()
    {
        $request = Yii::$app->request->get();
        $quiz_id_req = isset($request['id']) ? $request['id'] : '';
        $ex = explode('_', Utility::encrypt_decrypt('decrypt', $quiz_id_req));

        if (!isset($ex[1]) || (!is_numeric($ex[1]))) {
            throw new NotFoundHttpException("Không tìm thấy trang này.");
        }
        $quiz_id = $ex[1];
        $quiz = Quiz::findById($quiz_id);
        if (empty($quiz_id)) {
            throw new NotFoundHttpException("Không tìm thấy trang này.");
        }
        return $this->render('do_contest', [
            'quiz' => $quiz
        ]);
    }

    public function actionCheckQuiz()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra.']);
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();
        $quiz_id = isset($request['quiz_id']) ? $request['quiz_id'] : '';

        $quiz = Quiz::findOne(['quiz_id' => $quiz_id, 'status' => 1]);
        if (empty($quiz)) {
            echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra.']);
            Yii::$app->end();
        }

        $user = Yii::$app->user->identity;
        // nếu là tài khoản giáo viên
        if (!empty($user) && $user->type == 2 && $user->teacher_id != '') {
            if ($quiz['price'] > 0 || $quiz['vip'] > 0) {
                echo json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không có quyền để làm bài thi này.']);
                Yii::$app->end();
            }
        }

        // nếu đề thi bắt đăng nhập
        if (($quiz['price'] > 0 || $quiz['vip'] > 0) && empty($user)) {
            echo json_encode(['status' => 0, 'message' => 'Bạn phải <a href="' . Url::toRoute(['/site/login']) . '">đăng nhập</a> để làm bài thi.']);
            Yii::$app->end();
        }

        // check đề thi VIP
        if ($quiz['vip'] > 0 && (!empty($user)) && $user->student_id != '') {
            // kiêm tra học sinh có đăng ký gói VIP (10, 30, 365)
            $check_vip = StudentPackage::check_student_vip($user->student_id);
            if (!$check_vip) {
                echo json_encode(['status' => 0, 'message' => 'Đây là đề thi VIP, hãy <a href="' . Url::toRoute(['/site/login']) . '"><i>đăng ký</i></a> ngay gói cước VIP để làm bài thi này.']);
                Yii::$app->end();
            }
        }

        echo json_encode(['status' => 1, 'message' => 'OK']);
        Yii::$app->end();
    }
}