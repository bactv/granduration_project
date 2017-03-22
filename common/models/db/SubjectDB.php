<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $subject_id
 * @property string $subject_name
 * @property string $subject_description
 */
class SubjectDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_name'], 'required'],
            [['subject_name'], 'string', 'max' => 50],
            [['subject_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => Yii::t('cms', 'Subject ID'),
            'subject_name' => Yii::t('cms', 'Subject Name'),
            'subject_description' => Yii::t('cms', 'Subject Description'),
        ];
    }
}
