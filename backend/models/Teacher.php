<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use common\components\Utility;
use Yii;
use yii\behaviors\BlameableBehavior;


class Teacher extends \common\models\TeacherBase
{
    public $avatar;
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
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'tch_created_by',
                'updatedByAttribute' => 'tch_updated_by',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tch_full_name'], 'required'],
            [['tch_gender', 'tch_status', 'tch_avatar', 'tch_created_by', 'tch_updated_by'], 'integer'],
            [['tch_intro'], 'string'],
            [['tch_created_time', 'tch_updated_time'], 'safe'],
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_work_place', 'tch_degree', 'tch_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * Upload avatar
     * @param $id
     * @return bool
     */
    public function uploadAvatar($id)
    {
        if ($this->avatar == null) {
            return true;
        }
        $path =  Yii::$app->params['img_url']['avatar_teacher']['folder'] . '/';
        $path_admin = Yii::getAlias('@webroot') . '/storage/' . $path;
        if (!is_dir($path_admin)) {
            mkdir($path_admin, 0777);
        }
        if ($this->validate()) {
            $this->avatar->saveAs($path_admin . $id . '.png');
            return Utility::uploadFile($path, $path . $id . '.png', Yii::$app->params['cms_url'] . 'storage/' . $path . $id . '.png');
        } else {
            return false;
        }
    }

    public static function getAttributeValue($conditions, $attribute)
    {
        $object = self::findOne($conditions);
        if (!empty($object) && isset($object->{$attribute})) {
            return $object->{$attribute};
        }
        return '';
    }


}