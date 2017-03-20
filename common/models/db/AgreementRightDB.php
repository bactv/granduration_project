<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "agreement_right".
 *
 * @property integer $agreement_right_id
 * @property string $agreement_right_name
 * @property string $agreement_right_description
 */
class AgreementRightDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_right_name'], 'required'],
            [['agreement_right_description'], 'string'],
            [['agreement_right_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agreement_right_id' => Yii::t('cms', 'Agreement Right ID'),
            'agreement_right_name' => Yii::t('cms', 'Agreement Right Name'),
            'agreement_right_description' => Yii::t('cms', 'Agreement Right Description'),
        ];
    }
}
