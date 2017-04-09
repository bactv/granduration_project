<?php

namespace frontend\models;

use Yii;
use yii\web\IdentityInterface;


class User extends \common\models\UserBase implements IdentityInterface
{
    public $avatar;
    public $rememberMe;
    private $_user = false;

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
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
        return $this->id;
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'student_id', 'teacher_id', 'status'], 'integer'],
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 255],
            ['password', 'validatePassword', 'on' => 'login']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('web', 'ID'),
            'type' => Yii::t('web', 'Type'),
            'student_id' => Yii::t('web', 'Student ID'),
            'teacher_id' => Yii::t('web', 'Teacher ID'),
            'username' => Yii::t('web', 'Username'),
            'password' => Yii::t('web', 'Password'),
            'status' => Yii::t('web', 'Status'),
        ];
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        if ($type != 'teacher') {
            $type = 'student';
        }
        if (!$this->hasErrors()) {
            $user = $this->getUser($type);
            $hash = md5($this->password);
            if (!$user || !($user->password === $hash)) {
                $this->addError($attribute, 'Tên đăng nhập hoặc mật khẩu không hợp lệ');
            }
        }
    }
    /**
     * Logs in a user using the provided username and password.
     * @param $type
     * @return boolean whether the user is logged in successfully
     */
    public function login($type)
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser($type), $this->rememberMe ? 30*24*60*60 : 0);
        } else {
            return false;
        }
    }
    /**
     * Finds user by [[username]]
     * @param $type
     * @return User | null
     */
    public function getUser($type)
    {
        $type_id = ($type == 'teacher') ? 2 : 1;
        if ($this->_user === false) {
            $this->_user = User::findOne(['username' => $this->username, 'type' => $type_id]);
        }
        return $this->_user;
    }
}