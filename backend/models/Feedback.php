<?php

namespace backend\models;

use Yii;


class Feedback extends \common\models\FeedbackBase
{
    public static function list_new_feedback()
    {
        $allData = self::find()->where(['deleted' => 0])
            ->andWhere(['response' => 0])
            ->orderBy('updated_time DESC')
            ->all();
        return $allData;
    }

    public static function get_parent_root_feedback($feedback_id)
    {
        $model = Feedback::findOne(['id' => $feedback_id]);
        $root_id = $feedback_id;
        if (!empty($model)) {
            $root_id = $model->parent_id;
            self::get_parent_root_feedback($root_id);
        }
        return $root_id;
    }
}