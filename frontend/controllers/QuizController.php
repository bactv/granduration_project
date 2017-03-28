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
use yii\web\NotFoundHttpException;

class QuizController extends FrontendController
{
    public function actionContestPractice($quiz_id = 1)
    {
        $this->layout = 'main_2';
        $quiz = Quiz::findById($quiz_id);
        if (empty($quiz_id)) {
            throw new NotFoundHttpException("Not Found");
        }
        return $this->render('contest_practice', [
            'quiz' => $quiz
        ]);
    }
}