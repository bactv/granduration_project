<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 30/04/2017
 * Time: 9:30 SA
 */
namespace frontend\components;

use frontend\models\Student;

class Charging
{
    public static function processCharge(Student $std, $action = '', $price = 0)
    {
        $std->std_balance += $price;
        if ($std->save()) {
            // log transaction
            return true;
        }
        return false;
    }
}