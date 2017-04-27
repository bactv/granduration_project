<?php

namespace frontend\models;

use Yii;


class Degree extends \common\models\DegreeBase
{
    public static function getAttributeValue($id, $attribute)
    {
        $obj = Degree::findOne(['id' => $id]);
        if (!empty($obj) && isset($obj->{$attribute})) {
            return $obj->{$attribute};
        }
        return '';
    }
}