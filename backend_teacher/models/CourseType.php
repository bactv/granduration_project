<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 8:11 SA
 */
namespace backend_teacher\models;

use common\models\CourseTypeBase;

class CourseType extends CourseTypeBase
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