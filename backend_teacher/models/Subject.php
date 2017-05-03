<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 7:56 SA
 */
namespace backend_teacher\models;

class Subject extends \common\models\SubjectBase
{
    public static function getAttributeValue($condition, $attribute)
    {
        $obj = self::findOne($condition);
        if (!empty($obj) && isset($obj->{$attribute})) {
            return $obj->{$attribute};
        }
        return '';
    }
}