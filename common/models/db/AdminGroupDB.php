<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_group".
 *
 * @property integer $ad_group_id
 * @property string $ad_group_name
 * @property string $ad_group_description
 * @property string $ad_group_action_ids
 * @property integer $ad_group_status
 * @property string $ad_group_created_time
 * @property string $ad_group_updated_time
 */
class AdminGroupDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_group_name'], 'required'],
            [['ad_group_status'], 'integer'],
            [['ad_group_created_time', 'ad_group_updated_time'], 'safe'],
            [['ad_group_name', 'ad_group_description', 'ad_group_action_ids'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ad_group_id' => Yii::t('cms', 'Ad Group ID'),
            'ad_group_name' => Yii::t('cms', 'Ad Group Name'),
            'ad_group_description' => Yii::t('cms', 'Ad Group Description'),
            'ad_group_action_ids' => Yii::t('cms', 'Ad Group Action Ids'),
            'ad_group_status' => Yii::t('cms', 'Ad Group Status'),
            'ad_group_created_time' => Yii::t('cms', 'Ad Group Created Time'),
            'ad_group_updated_time' => Yii::t('cms', 'Ad Group Updated Time'),
        ];
    }
}
