<?php

namespace backend\models;

use Yii;


class ClassLevel extends \common\models\ClassLevelBase
{
    public static function getAttributeValue($conditions, $attr_return)
    {
        $object = self::find()->where($conditions)->one();
        if (!empty($object) && isset($object->{$attr_return})) {
            return $object->{$attr_return};
        }
        return '';
    }
}