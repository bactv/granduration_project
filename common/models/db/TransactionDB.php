<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property string $created_time
 * @property integer $student_id
 * @property string $action
 * @property integer $package_id
 * @property string $price
 * @property integer $request_status
 * @property string $request_body
 * @property integer $response_status
 * @property string $response_body
 * @property string $request_time
 * @property string $response_time
 */
class TransactionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'student_id', 'package_id', 'request_status', 'response_status'], 'integer'],
            [['created_time', 'request_time', 'response_time'], 'safe'],
            [['price'], 'number'],
            [['action', 'request_body', 'response_body'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'student_id' => Yii::t('cms', 'Student ID'),
            'action' => Yii::t('cms', 'Action'),
            'package_id' => Yii::t('cms', 'Package ID'),
            'price' => Yii::t('cms', 'Price'),
            'request_status' => Yii::t('cms', 'Request Status'),
            'request_body' => Yii::t('cms', 'Request Body'),
            'response_status' => Yii::t('cms', 'Response Status'),
            'response_body' => Yii::t('cms', 'Response Body'),
            'request_time' => Yii::t('cms', 'Request Time'),
            'response_time' => Yii::t('cms', 'Response Time'),
        ];
    }
}
