<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "agreement_type".
 *
 * @property integer $agreement_type_id
 * @property string $agreement_type_name
 * @property string $agreement_type_description
 */
class AgreementTypeDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_type_name'], 'required'],
            [['agreement_type_name', 'agreement_type_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agreement_type_id' => Yii::t('cms', 'Agreement Type ID'),
            'agreement_type_name' => Yii::t('cms', 'Agreement Type Name'),
            'agreement_type_description' => Yii::t('cms', 'Agreement Type Description'),
        ];
    }
}
