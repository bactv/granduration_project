<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admin_controller".
 *
 * @property integer $ad_controller_id
 * @property string $ad_controller_name
 * @property string $ad_controller_description
 * @property string $ad_controller_updated_time
 */
class AdminControllerDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_controller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_controller_name'], 'required'],
            [['ad_controller_updated_time'], 'safe'],
            [['ad_controller_name'], 'string', 'max' => 30],
            [['ad_controller_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ad_controller_id' => Yii::t('cms', 'Ad Controller ID'),
            'ad_controller_name' => Yii::t('cms', 'Ad Controller Name'),
            'ad_controller_description' => Yii::t('cms', 'Ad Controller Description'),
            'ad_controller_updated_time' => Yii::t('cms', 'Ad Controller Updated Time'),
        ];
    }
}
