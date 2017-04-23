<?php

namespace frontend\models;

use Yii;


class QuizType extends \common\models\QuizTypeBase
{
    public static function getAttributeValue($conditions, $attribute)
    {
        $object = self::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }
}