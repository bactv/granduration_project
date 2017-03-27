<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 27/03/2017
 * Time: 10:23 CH
 */
namespace frontend\models;

use common\models\StudentBase;
use Yii;
use yii\helpers\Html;
use yii\web\IdentityInterface;

class Student extends StudentBase implements IdentityInterface
{
    public $rememberMe;
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

    public function login($username, $password)
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser($username, $password), $this->rememberMe ? 36000 : 0);
        } else {
            return false;
        }
    }

    private function getUser($username, $password)
    {
        $object = Student::findOne(['std_username' => $username, 'std_password' => Yii::$app->security->generatePasswordHash($password)]);
        return !empty($object) ? $object : null;
    }

    public function validateStdPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->addError($attribute, Yii::t('cms', 'check_login_fail'));
        }
    }
    public function rules()
    {
        return [
            [['std_username', 'std_password'], 'required'],
            ['rememberMe', 'boolean'],
            ['std_password', 'validateStdPassword'],
        ];
    }
}