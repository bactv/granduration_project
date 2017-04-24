<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "student_package".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $package_id
 * @property string $expire_date
 * @property string $created_time
 */
class StudentPackageDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'package_id'], 'required'],
            [['student_id', 'package_id'], 'integer'],
            [['expire_date', 'created_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'student_id' => Yii::t('cms', 'Student ID'),
            'package_id' => Yii::t('cms', 'Package ID'),
            'expire_date' => Yii::t('cms', 'Expire Date'),
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
