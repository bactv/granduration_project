<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 9:13 CH
 */
namespace frontend\models;

use common\models\QuizBase;
use yii\db\Query;

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
}