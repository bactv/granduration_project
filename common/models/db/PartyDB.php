<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "party".
 *
 * @property integer $party_id
 * @property integer $party_type_id
 * @property string $party_name
 * @property string $party_rep_title
 * @property string $party_address
 * @property string $party_tax_code
 * @property string $party_phone
 * @property string $party_created_time
 * @property string $party_updated_time
 * @property integer $party_created_by
 * @property integer $party_updated_by
 */
class PartyDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'party';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_type_id', 'party_name'], 'required'],
            [['party_type_id', 'party_created_by', 'party_updated_by'], 'integer'],
            [['party_created_time', 'party_updated_time'], 'safe'],
            [['party_name', 'party_rep_title', 'party_address', 'party_tax_code', 'party_phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'party_id' => Yii::t('cms', 'Party ID'),
            'party_type_id' => Yii::t('cms', 'Party Type ID'),
            'party_name' => Yii::t('cms', 'Party Name'),
            'party_rep_title' => Yii::t('cms', 'Party Rep Title'),
            'party_address' => Yii::t('cms', 'Party Address'),
            'party_tax_code' => Yii::t('cms', 'Party Tax Code'),
            'party_phone' => Yii::t('cms', 'Party Phone'),
            'party_created_time' => Yii::t('cms', 'Party Created Time'),
            'party_updated_time' => Yii::t('cms', 'Party Updated Time'),
            'party_created_by' => Yii::t('cms', 'Party Created By'),
            'party_updated_by' => Yii::t('cms', 'Party Updated By'),
        ];
    }
}
