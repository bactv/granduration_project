<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "agreement_temp".
 *
 * @property integer $id
 * @property string $agreement_code
 * @property integer $party_id_a
 * @property integer $party_id_b
 * @property string $agreement_signed_date
 * @property string $agreement_effective_date
 * @property string $agreement_right_ids
 * @property integer $agreement_type_id
 * @property double $mg
 * @property integer $status
 */
class AgreementTempDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_code'], 'required'],
            [['party_id_a', 'party_id_b', 'agreement_type_id', 'status'], 'integer'],
            [['agreement_signed_date', 'agreement_effective_date'], 'safe'],
            [['mg'], 'number'],
            [['agreement_code'], 'string', 'max' => 255],
            [['agreement_right_ids'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'agreement_code' => Yii::t('cms', 'Agreement Code'),
            'party_id_a' => Yii::t('cms', 'Party Id A'),
            'party_id_b' => Yii::t('cms', 'Party Id B'),
            'agreement_signed_date' => Yii::t('cms', 'Agreement Signed Date'),
            'agreement_effective_date' => Yii::t('cms', 'Agreement Effective Date'),
            'agreement_right_ids' => Yii::t('cms', 'Agreement Right Ids'),
            'agreement_type_id' => Yii::t('cms', 'Agreement Type ID'),
            'mg' => Yii::t('cms', 'Mg'),
            'status' => Yii::t('cms', 'Status'),
        ];
    }
}
