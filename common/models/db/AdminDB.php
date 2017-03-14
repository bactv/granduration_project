<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $ad_id
 * @property string $ad_username
 * @property string $ad_password
 * @property string $ad_full_name
 * @property string $ad_email
 * @property string $ad_profession
 * @property string $ad_birthday
 * @property integer $ad_avatar
 * @property integer $ad_status
 * @property string $ad_last_active_time
 * @property integer $ad_created_by
 * @property integer $ad_updated_by
 * @property string $ad_created_time
 * @property string $ad_updated_time
 * @property string $ad_group_ids
 */
class AdminDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_username', 'ad_password'], 'required'],
            [['ad_birthday', 'ad_last_active_time', 'ad_created_time', 'ad_updated_time'], 'safe'],
            [['ad_avatar', 'ad_status', 'ad_created_by', 'ad_updated_by'], 'integer'],
            [['ad_username'], 'string', 'max' => 50],
            [['ad_password', 'ad_profession'], 'string', 'max' => 255],
            [['ad_full_name', 'ad_email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ad_id' => Yii::t('cms', 'Ad ID'),
            'ad_username' => Yii::t('cms', 'Ad Username'),
            'ad_password' => Yii::t('cms', 'Ad Password'),
            'ad_full_name' => Yii::t('cms', 'Ad Full Name'),
            'ad_email' => Yii::t('cms', 'Ad Email'),
            'ad_profession' => Yii::t('cms', 'Ad Profession'),
            'ad_birthday' => Yii::t('cms', 'Ad Birthday'),
            'ad_avatar' => Yii::t('cms', 'Ad Avatar'),
            'ad_status' => Yii::t('cms', 'Ad Status'),
            'ad_last_active_time' => Yii::t('cms', 'Ad Last Active Time'),
            'ad_created_by' => Yii::t('cms', 'Ad Created By'),
            'ad_updated_by' => Yii::t('cms', 'Ad Updated By'),
            'ad_created_time' => Yii::t('cms', 'Ad Created Time'),
            'ad_updated_time' => Yii::t('cms', 'Ad Updated Time'),
            'ad_group_ids' => Yii::t('cms', 'Ad Group Ids'),
        ];
    }
}
