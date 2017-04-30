<?php

namespace frontend\models;

use Yii;
use yii\db\Query;


class QuizRating extends \common\models\QuizRatingBase
{
    public static function get_info($quiz_id)
    {
        $query = (new Query())
            ->select([
                'COUNT(id) as total_rating',
                'SUM(rate) as total_point_rating',
            ])
            ->from('quiz_rating')
            ->where(['quiz_id' => $quiz_id])
            ->one();
        $total_rating = $query['total_rating'];
        $point = ($total_rating != 0) ? number_format($query['total_point_rating'] / $total_rating, 1) : 0;
        return compact('total_rating', 'point');
    }
}