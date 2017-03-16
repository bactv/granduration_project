<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class Admin extends \common\models\AdminBase implements IdentityInterface
{
    public $avatar;
    public $new_password;
    public $re_new_password;

    /**
     * Behaviors
     * @return array
     */
    public function behaviors()
    {
        return array(
            array(
                'class' => TimestampBehavior::class,
                'attributes' => array(
                    self::EVENT_BEFORE_INSERT => array('ad_created_time', 'ad_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('ad_updated_time')
                )
            ),
        );
    }

//    public function rules()
//    {
//        $new_rule = [
//            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
//        ];
//        return array_merge(parent::rules(), $new_rule);
//    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return ActiveRecord | null
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        $admin = static::find()->where(['ad_id' => $id, 'ad_status' => 1])->one();
        return (!empty($admin) ? $admin : null);
    }
    /**
     * Finds an identity by the given username.
     * @param string $username
     * @return ActiveRecord | null
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findByUsername($username)
    {
        // TODO: Implement findIdentity() method.
        $admin = static::find()->where(['ad_username' => $username, 'ad_status' => 1])->one();
        return (!empty($admin) ? $admin : null);
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
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->ad_id;
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
     * @return boolean whether the given auth key is valid.
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
        $this->ad_password = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Validate password
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->ad_password);
    }

    /**
     * Upload avatar
     * @return bool
     */
    public function uploadAvatar()
    {
        $path = Yii::$app->params['storage_url'] . '/' . Yii::$app->params['img_url']['admin_avatar']['source'] . '/';

        if (!file_exists($path)) {
            mkdir($path);
        }
        if ($this->validate()) {
            $this->avatar->saveAs($path . $this->ad_id . '.png');
            return true;
        } else {
            return false;
        }
    }

    public static function getAttributeValue($conditions, $attr_return)
    {
        $object = self::find()->where($conditions)->one();
        if (!empty($object) && isset($object->{$attr_return})) {
            return $object->{$attr_return};
        }
        return '';
    }
}