<?php

namespace backend\models;

use Yii;


class Package extends \common\models\PackageBase
{
    public function rules()
    {
        return [
            [['pk_name', 'pk_code'], 'required'],
            [['pk_price'], 'number'],
            [['pk_status'], 'integer'],
            [['pk_name', 'pk_code', 'pk_description'], 'string', 'max' => 255],
            ['pk_code', 'validatePackageCode', 'on' => 'create']
        ];
    }

    public function validatePackageCode()
    {
        $check = Package::findAll(['pk_code' => $this->pk_code]);
        if (!empty($check)) {
            $this->addError('pk_code', 'Mã gói cước đã tồn tại. Vui lòng thay đổi tên mã gói.');
        }
    }
}