<?php

namespace frontend\models;

use backend\models\Package;
use Yii;


class StudentPackage extends \common\models\StudentPackageBase
{
    public static function check_student_vip($student_id)
    {
        /**
         * PACKAGE VIP: 4: PAG_VIP10, 5: PAG_VIP30, 6: PAG_VIP365
         */
        $data = StudentPackage::find()->where([
            'student_id' => $student_id,
            'package_id' => ['4, 5, 6'],
        ])->andWhere(['>=', 'expire_date', date('Y-m-d H:i:s')])
        ->all();
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public static function check_package_active_student($student_id, $package_id)
    {
        $data = StudentPackage::find()->where([
            'student_id' => $student_id,
            'package_id' => $package_id,
        ])->andWhere(['>=', 'expire_date', date('Y-m-d H:i:s')])
            ->all();
        if (!empty($data)) {
            return true;
        }
        return false;
    }

    public static function register_package(Student $std, Package $pk)
    {
        if (doubleval($std->std_balance) < doubleval($pk->pk_price)) {
            return false;
        }
        $model = new StudentPackage();
        $model->student_id = $std->std_id;
        $model->package_id = $pk->pk_id;
        $model->expire_date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +' . $pk->pk_duration . ' days'));
        $model->created_time = date('Y-m-d H:i:s');

        $std->std_balance -= (doubleval($pk->pk_price));
        if ($std->save() && $model->save()) {
            // log transaction
            // ////

            return true;
        }
        return false;
    }
}