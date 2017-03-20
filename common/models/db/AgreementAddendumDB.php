<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "agreement_addendum".
 *
 * @property integer $addendum_id
 * @property integer $agreement_id
 * @property string $addendum_number
 * @property string $addendum_content
 * @property string $addendum_created_time
 * @property string $addendum_updated_time
 * @property integer $addendum_created_by
 * @property integer $addendum_updated_by
 */
class AgreementAddendumDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_addendum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_id', 'addendum_number'], 'required'],
            [['agreement_id', 'addendum_created_by', 'addendum_updated_by'], 'integer'],
            [['addendum_content'], 'string'],
            [['addendum_created_time', 'addendum_updated_time'], 'safe'],
            [['addendum_number'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'addendum_id' => Yii::t('cms', 'Addendum ID'),
            'agreement_id' => Yii::t('cms', 'Agreement ID'),
            'addendum_number' => Yii::t('cms', 'Addendum Number'),
            'addendum_content' => Yii::t('cms', 'Addendum Content'),
            'addendum_created_time' => Yii::t('cms', 'Addendum Created Time'),
            'addendum_updated_time' => Yii::t('cms', 'Addendum Updated Time'),
            'addendum_created_by' => Yii::t('cms', 'Addendum Created By'),
            'addendum_updated_by' => Yii::t('cms', 'Addendum Updated By'),
        ];
    }
}
