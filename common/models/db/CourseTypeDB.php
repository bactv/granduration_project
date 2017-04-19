<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_type".
 *
 * @property integer $type_id
 * @property string $type_code
 * @property string $type_name
 * @property string $type_description
 */
class CourseTypeDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_code', 'type_name'], 'required'],
            [['type_code', 'type_name', 'type_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => Yii::t('web', 'Type ID'),
            'type_code' => Yii::t('web', 'Type Code'),
            'type_name' => Yii::t('web', 'Type Name'),
            'type_description' => Yii::t('web', 'Type Description'),
        ];
    }
}
