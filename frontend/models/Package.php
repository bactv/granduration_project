<?php

namespace frontend\models;

use Yii;


class Package extends \common\models\PackageBase
{
    public static function getAttributeValue($conditions, $attribute)
    {
        $object = Package::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }
}