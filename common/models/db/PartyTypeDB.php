<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "party_type".
 *
 * @property integer $party_type_id
 * @property string $party_type_name
 * @property string $party_type_description
 * @property string $party_type_created_time
 * @property string $party_type_updated_time
 * @property integer $party_type_created_by
 * @property integer $party_type_updated_by
 */
class PartyTypeDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'party_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_type_name'], 'required'],
            [['party_type_created_time', 'party_type_updated_time'], 'safe'],
            [['party_type_created_by', 'party_type_updated_by'], 'integer'],
            [['party_type_name', 'party_type_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'party_type_id' => Yii::t('cms', 'Party Type ID'),
            'party_type_name' => Yii::t('cms', 'Party Type Name'),
            'party_type_description' => Yii::t('cms', 'Party Type Description'),
            'party_type_created_time' => Yii::t('cms', 'Party Type Created Time'),
            'party_type_updated_time' => Yii::t('cms', 'Party Type Updated Time'),
            'party_type_created_by' => Yii::t('cms', 'Party Type Created By'),
            'party_type_updated_by' => Yii::t('cms', 'Party Type Updated By'),
        ];
    }
}
