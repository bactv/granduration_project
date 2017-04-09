<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 8:56 CH
 */
namespace frontend\controllers;

use frontend\models\Quiz;
use Yii;
use frontend\components\FrontendController;
use yii\base\Controller;
use yii\web\NotFoundHttpException;

class QuizController extends Controller
{
    public function actionListContest()
    {
        return $this->render('list_contest_practice');
    }

    public function actionDetail()
    {
        return $this->render('contest_detail');
    }

    public function actionDoContest($quiz_id = 1)
    {
        $quiz = Quiz::findById($quiz_id);
        if (empty($quiz_id)) {
            throw new NotFoundHttpException("Not Found");
        }
        return $this->render('contest_practice', [
            'quiz' => $quiz
        ]);
    }
}