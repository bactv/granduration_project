<?php

namespace frontend\models;

use common\behaviors\TimestampBehavior;
use Yii;


class Teacher extends \common\models\TeacherBase
{
    public $rememberMe;
    public $new_password;
    public $re_new_password;
    public $avatar;

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tch_id' => Yii::t('web', 'Tch ID'),
            'tch_username' => Yii::t('web', 'Tch Username'),
            'tch_password' => Yii::t('web', 'Tch Password'),
            'tch_full_name' => Yii::t('web', 'Tch Full Name'),
            'tch_gender' => Yii::t('web', 'Tch Gender'),
            'tch_intro' => Yii::t('web', 'Tch Intro'),
            'tch_work_place' => Yii::t('web', 'Tch Work Place'),
            'tch_degree' => Yii::t('web', 'Tch Degree'),
            'tch_email' => Yii::t('web', 'Tch Email'),
            'tch_status' => Yii::t('web', 'Tch Status'),
            'tch_created_time' => Yii::t('web', 'Tch Created Time'),
            'tch_updated_time' => Yii::t('web', 'Tch Updated Time'),
            'tch_created_by' => Yii::t('web', 'Tch Created By'),
            'tch_updated_by' => Yii::t('web', 'Tch Updated By'),
        ];
    }

    public function rules()
    {
        return [
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_email'], 'required'],
            [['tch_gender', 'tch_status', 'tch_created_by', 'tch_updated_by'], 'integer'],
            [['tch_intro'], 'string'],
            [['tch_created_time', 'tch_updated_time'], 'safe'],
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_work_place', 'tch_email'], 'string', 'max' => 255],
            ['tch_username', 'validateTchUsername'],
            ['tch_email', 'validateEmail']
        ];
    }

    public function validateTchUsername()
    {
        $object = self::findOne(['tch_username' => $this->tch_username]);
        if (!empty($object)) {
            $this->addError('tch_username', 'Tên đăng nhập đã tồn tại, vui lòng chọn tên khác.');
        }
    }

    public function validateEmail()
    {
        if (!filter_var($this->tch_email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('tch_email', 'Địa chỉ email không hợp lệ.');
        }
    }

    public function signup(Teacher $tch)
    {
        if (!$this->validate()) {
            return false;
        }
        $tch->tch_password = $this->setTchPassword($tch->tch_password);
        if ($tch->save()) {
            $user = new User();
            $user->type = 2;
            $user->student_id = '';
            $user->teacher_id = $tch->tch_id;
            $user->username = $tch->tch_username;
            $user->password = $tch->tch_password;
            $user->status = 1;
            if ($user->save()) {
                return true;
            }
            return false;
        }
        return false;
    }

    private function setTchPassword($password)
    {
        return md5($password);
    }

    public static function getAttributeValue($conditions, $attribute)
    {
        $object = self::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }

    public static function get_list_teacher($params = [])
    {
        $lists = Teacher::find()->where(['tch_status' => 1]);
        if (!empty($params['class_id'])) {
            $courses = Course::findAll(['class_level_id' => $params['class_id']]);
            $arr_tch_ids = [];
            foreach ($courses as $c) {
                $arr_tch_ids[] = $c->teacher_id;
            }
            $lists->andWhere(['tch_id' => $arr_tch_ids]);
        }
        if (!empty($params['subject_id'])) {
            $courses = Course::findAll(['subject_id' => $params['subject_id']]);
            $arr_tch_ids = [];
            foreach ($courses as $c) {
                $arr_tch_ids[] = $c->teacher_id;
            }
            $lists->andWhere(['tch_id' => $arr_tch_ids]);
        }
        $lists = $lists->all();
        return $lists;
    }

    public function upload_avatar()
    {

    }

    public static function get_teacher($teacher_id)
    {
        return self::findOne(['tch_id' => $teacher_id, 'tch_status' => 1]);
    }
}