<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 7:56 SA
 */
namespace backend_teacher\models;

use common\models\ClassLevelBase;

class ClassLevel extends ClassLevelBase
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