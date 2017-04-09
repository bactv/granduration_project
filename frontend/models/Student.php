<?php

namespace frontend\models;

use common\behaviors\TimestampBehavior;
use Yii;


class Student extends \common\models\StudentBase
{
    public $new_password;
    public $re_new_password;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['std_created_time', 'std_updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['std_updated_time']
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_username', 'std_password', 'std_full_name'], 'required'],
            [['std_balance', 'std_status'], 'integer'],
            [['std_created_time', 'std_updated_time'], 'safe'],
            [['std_username', 'std_birthday'], 'string', 'max' => 50],
            [['std_password'], 'string', 'max' => 255],
            [['std_full_name', 'std_school_name'], 'string', 'max' => 100],
            [['std_phone'], 'string', 'max' => 30],
            ['std_username', 'validateUsername', 'on' => 'create'],
            ['re_new_password', 'validateReNewPassword']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_id' => Yii::t('web', 'Std ID'),
            'std_username' => Yii::t('web', 'Std Username'),
            'std_password' => Yii::t('web', 'Std Password'),
            'std_full_name' => Yii::t('web', 'Std Full Name'),
            'std_phone' => Yii::t('web', 'Std Phone'),
            'std_birthday' => Yii::t('web', 'Std Birthday'),
            'std_school_name' => Yii::t('web', 'Std School Name'),
            'std_balance' => Yii::t('web', 'Std Balance'),
            'std_status' => Yii::t('web', 'Std Status'),
            'std_created_time' => Yii::t('web', 'Std Created Time'),
            'std_updated_time' => Yii::t('web', 'Std Updated Time'),
        ];
    }


    public function validateUsername()
    {
        $object = self::findOne(['std_username' => $this->std_username]);
        if (!empty($object)) {
            $this->addError('std_username', 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.');
        }
    }

    public function validateReNewPassword()
    {
        if ($this->new_password != '') {
            if ($this->re_new_password == '') {
                $this->addError('re_new_password', 'Vui lòng nhập lại mật khẩu lần nữa');
            } else if ($this->re_new_password !== $this->new_password) {
                $this->addError('re_new_password', 'Mật khẩu không khớp');
            }
        }
    }

    public function signup(Student $model)
    {
        if (!$this->validate()) {
            return false;
        }
        $model->std_password = $this->setPassword($model->std_password);
        if ($model->save()) {
            $user = new User();
            $user->type = 1;
            $user->student_id = $model->std_id;
            $user->teacher_id = '';
            $user->username = $model->std_username;
            $user->password = $model->std_password;
            $user->status = 1;
            if ($user->save()) {
                return true;
            }
            return false;
        }
        return false;
    }

    private function setPassword($password)
    {
        return md5($password);
    }
}