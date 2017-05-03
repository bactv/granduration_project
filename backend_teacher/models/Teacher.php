<?php

namespace backend_teacher\models;

use common\behaviors\TimestampBehavior;
use common\components\Utility;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\web\IdentityInterface;


class Teacher extends \common\models\TeacherBase implements IdentityInterface
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
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_work_place', 'tch_email'], 'string', 'max' => 255]
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


    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne(['tch_id' => $id, 'tch_status' => 1]);
    }

    public static function findByUsername($username)
    {
        // TODO: Implement findIdentity() method.
        return self::findOne(['tch_username' => $username, 'tch_status' => 1]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->tch_id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    /**
     * Encrypt password
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->tch_password = md5($password);
    }
    /**
     * Validate password
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return md5($password) == $this->tch_password;
    }
}