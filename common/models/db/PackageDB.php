<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $pk_id
 * @property string $pk_name
 * @property string $pk_code
 * @property integer $pk_duration
 * @property string $pk_description
 * @property string $pk_price
 * @property integer $pk_status
 * @property integer $pk_deleted
 */
class PackageDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_name', 'pk_code'], 'required'],
            [['pk_duration', 'pk_status', 'pk_deleted'], 'integer'],
            [['pk_price'], 'number'],
            [['pk_name', 'pk_code', 'pk_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_id' => Yii::t('cms', 'Pk ID'),
            'pk_name' => Yii::t('cms', 'Pk Name'),
            'pk_code' => Yii::t('cms', 'Pk Code'),
            'pk_duration' => Yii::t('cms', 'Pk Duration'),
            'pk_description' => Yii::t('cms', 'Pk Description'),
            'pk_price' => Yii::t('cms', 'Pk Price'),
            'pk_status' => Yii::t('cms', 'Pk Status'),
            'pk_deleted' => Yii::t('cms', 'Pk Deleted'),
        ];
    }
}
