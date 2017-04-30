<?php

namespace frontend\models;

use Yii;


class Subject extends \common\models\SubjectBase
{
    public static function getAttributeValue($conditions, $attribute)
    {
        $object = self::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }

    public static function get_all_subjects()
    {
        return self::find()->all();
    }
}