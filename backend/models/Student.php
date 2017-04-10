<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;


class Student extends \common\models\StudentBase
{
    public $newPassword;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['tch_created_time', 'tch_updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['tch_updated_time']
                ]
            ]
        ];
    }
}