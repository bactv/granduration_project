<?php

namespace backend\models;

use Yii;


class Party extends \common\models\PartyBase
{
    public static function findByIdentify($id)
    {
        return self::find()->where(['party_id' => $id])->one();
    }

    public static function getAttributeValue($conditions, $attr_return)
    {
        $object = self::find()->where($conditions)->one();
        if (!empty($object) && isset($object->{$attr_return})) {
            return $object->{$attr_return};
        }
        return '';
    }
}