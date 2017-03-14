<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_action".
 *
 * @property integer $ad_action_id
 * @property integer $ad_controller_id
 * @property string $ad_controller_name
 * @property string $ad_action_name
 * @property string $ad_action_updated_time
 */
class AdminActionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_controller_id'], 'required'],
            [['ad_controller_id'], 'integer'],
            [['ad_action_updated_time'], 'safe'],
            [['ad_controller_name'], 'string', 'max' => 30],
            [['ad_action_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ad_action_id' => Yii::t('cms', 'Ad Action ID'),
            'ad_controller_id' => Yii::t('cms', 'Ad Controller ID'),
            'ad_controller_name' => Yii::t('cms', 'Ad Controller Name'),
            'ad_action_name' => Yii::t('cms', 'Ad Action Name'),
            'ad_action_updated_time' => Yii::t('cms', 'Ad Action Updated Time'),
        ];
    }
}
