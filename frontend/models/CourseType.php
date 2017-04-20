<?php

namespace frontend\models;

use Yii;


class CourseType extends \common\models\CourseTypeBase
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