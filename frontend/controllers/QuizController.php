<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 8:56 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\QuestionAnswer;
use frontend\models\Quiz;
use frontend\models\QuizAttempt;
use frontend\models\StudentPackage;
use Yii;
use frontend\components\FrontendController;
use yii\base\Controller;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class QuizController extends FrontendController
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

        $user_id = isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : null;
        $check = Quiz::check_user_permission($quiz_id, $user_id);
        $info = json_decode($check);
        if ($info->{'status'} == 0) {
            throw new NotFoundHttpException($info->{'message'});
        }

        return $this->render('do_contest', [
            'quiz' => $quiz
        ]);
    }

    public function actionCheckContest()
    {
        $request = Yii::$app->request->post();
        $datas = isset($request['data']) ? $request['data'] : [];
        $time_start = isset($request['time_start']) ? $request['time_start'] : '';
        $time_submit = time();

        $arr_results = [
            'info' => [
                'time_start' => date('Y-m-d H:i:s', $time_start),
                'time_submit' => date('Y-m-d H:i:s', $time_submit),
                'total_true' => 0,
                'total_questions' => 0
            ],
            'results' => [],
        ];
        foreach ($datas as $dt) {
            $obj = QuestionAnswer::check_answer($dt['question_id'], $dt['ans_id']);
            $arr_results['results'][] = [
                'question_id' => $dt['question_id'],
                'ans_id' => $dt['ans_id'],
                'check' => ($obj['check'] == true) ? 1 : 0,
                'solution' => $obj['solution']
            ];
            if ($obj['check'] == true) {
                $arr_results['info']['total_true'] += 1;
            }
            $arr_results['info']['total_questions'] += 1;
        }
        $attempt = new QuizAttempt();
        $attempt->content = json_encode($arr_results);
        $attempt->created_time = date('Y-m-d H:i:s');
        $attempt->save();
        return json_encode(['attempt_id' => Utility::encrypt_decrypt("encrypt", $attempt->id)]);
    }

    public function actionReviewContest($attempt_id = '')
    {
        $att_str = Utility::encrypt_decrypt("decrypt", $attempt_id);
        $ex = explode('_', $att_str);
        if (!isset($ex[1]) || trim($ex[1] == '')) {
            throw new NotFoundHttpException("Trang bạn tìm kiếm không tồn tại.");
        }

        $attempt = QuizAttempt::findOne(['id' => trim($ex[1])]);
        if (empty($attempt)) {
            throw new NotFoundHttpException("Trang bạn tìm kiếm không tồn tại.");
        }
        $data = (array)json_decode($attempt->content);
        return $this->render('review_contest', [
            'data' => $data
        ]);
    }

    /**
     * Kiểm tra tài khoản có đủ tiền để tham gia bài kiểm tra hay không:
     * + Nếu bài kiểm tra 0 đồng và không phải vip => không cần đăng nhập (giáo viên có thể làm)
     * + Nếu bài kiểm tra VIP => cần user vip
     * + Chỉ học sinh mới được quyền tham gia làm bài thi
     *
     */
    public function actionCheckQuiz()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra.']);
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();
        $quiz_id = isset($request['quiz_id']) ? $request['quiz_id'] : '';

        $user_id = isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : null;
        $check = Quiz::check_user_permission($quiz_id, $user_id);
        echo $check;
        Yii::$app->end();
    }
}