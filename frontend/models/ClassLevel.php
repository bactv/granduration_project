<?php

namespace frontend\models;

use Yii;


class ClassLevel extends \common\models\ClassLevelBase
{
    public static function getAttributeValue($conditions, $attribute)
    {
        $object = self::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }

    public static function get_all_class()
    {
        return self::find()->orderBy('class_level_id ASC')->all();
    }
}