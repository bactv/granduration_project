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
use Yii;
use frontend\components\FrontendController;
use yii\base\Controller;
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
        // nếu đề thi bắt đăng nhập

        echo json_encode(['status' => 1, 'message' => 'OK']);
        Yii::$app->end();
    }
}