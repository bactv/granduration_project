<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 9:13 CH
 */
namespace frontend\models;

use common\models\QuizBase;

class Quiz extends QuizBase
{
    public static function findById($quiz_id)
    {
        $object = Quiz::find()->where(['quiz_id' => $quiz_id, 'status' => 1])->one();
        return $object;
    }
}