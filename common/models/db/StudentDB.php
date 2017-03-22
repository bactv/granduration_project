<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $std_id
 * @property string $std_username
 * @property string $std_password
 * @property string $std_full_name
 * @property string $std_phone
 * @property string $std_birthday
 * @property string $std_school_name
 * @property integer $std_balance
 * @property integer $std_status
 * @property string $std_created_time
 * @property string $std_updated_time
 */
class StudentDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
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
            [['std_phone'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_id' => Yii::t('cms', 'Std ID'),
            'std_username' => Yii::t('cms', 'Std Username'),
            'std_password' => Yii::t('cms', 'Std Password'),
            'std_full_name' => Yii::t('cms', 'Std Full Name'),
            'std_phone' => Yii::t('cms', 'Std Phone'),
            'std_birthday' => Yii::t('cms', 'Std Birthday'),
            'std_school_name' => Yii::t('cms', 'Std School Name'),
            'std_balance' => Yii::t('cms', 'Std Balance'),
            'std_status' => Yii::t('cms', 'Std Status'),
            'std_created_time' => Yii::t('cms', 'Std Created Time'),
            'std_updated_time' => Yii::t('cms', 'Std Updated Time'),
        ];
    }
}
