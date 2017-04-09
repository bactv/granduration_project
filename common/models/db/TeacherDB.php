<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $tch_id
 * @property string $tch_username
 * @property string $tch_password
 * @property string $tch_full_name
 * @property integer $tch_gender
 * @property string $tch_intro
 * @property string $tch_work_place
 * @property string $tch_degree
 * @property string $tch_email
 * @property integer $tch_status
 * @property string $tch_created_time
 * @property string $tch_updated_time
 * @property integer $tch_created_by
 * @property integer $tch_updated_by
 */
class TeacherDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_email'], 'required'],
            [['tch_gender', 'tch_status', 'tch_created_by', 'tch_updated_by'], 'integer'],
            [['tch_intro'], 'string'],
            [['tch_created_time', 'tch_updated_time'], 'safe'],
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_work_place', 'tch_degree', 'tch_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tch_id' => Yii::t('cms', 'Tch ID'),
            'tch_username' => Yii::t('cms', 'Tch Username'),
            'tch_password' => Yii::t('cms', 'Tch Password'),
            'tch_full_name' => Yii::t('cms', 'Tch Full Name'),
            'tch_gender' => Yii::t('cms', 'Tch Gender'),
            'tch_intro' => Yii::t('cms', 'Tch Intro'),
            'tch_work_place' => Yii::t('cms', 'Tch Work Place'),
            'tch_degree' => Yii::t('cms', 'Tch Degree'),
            'tch_email' => Yii::t('cms', 'Tch Email'),
            'tch_status' => Yii::t('cms', 'Tch Status'),
            'tch_created_time' => Yii::t('cms', 'Tch Created Time'),
            'tch_updated_time' => Yii::t('cms', 'Tch Updated Time'),
            'tch_created_by' => Yii::t('cms', 'Tch Created By'),
            'tch_updated_by' => Yii::t('cms', 'Tch Updated By'),
        ];
    }
}
