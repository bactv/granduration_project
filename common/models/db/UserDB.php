<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $student_id
 * @property integer $teacher_id
 * @property string $username
 * @property string $password
 * @property integer $status
 */
class UserDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
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
            [['password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'type' => Yii::t('cms', 'Type'),
            'student_id' => Yii::t('cms', 'Student ID'),
            'teacher_id' => Yii::t('cms', 'Teacher ID'),
            'username' => Yii::t('cms', 'Username'),
            'password' => Yii::t('cms', 'Password'),
            'status' => Yii::t('cms', 'Status'),
        ];
    }
}
