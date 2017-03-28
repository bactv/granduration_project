<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property integer $quiz_id
 * @property string $quiz_name
 * @property string $quiz_description
 * @property integer $quiz_type_id
 * @property string $quiz_level
 * @property integer $subject_id
 * @property integer $class_level_id
 * @property string $question_ids
 * @property string $section
 * @property integer $status
 * @property string $price
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $time
 */
class QuizDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quiz_name'], 'required'],
            [['quiz_type_id', 'subject_id', 'class_level_id', 'status', 'created_by', 'updated_by', 'time'], 'integer'],
            [['quiz_level'], 'string'],
            [['price'], 'number'],
            [['created_time', 'updated_time'], 'safe'],
            [['quiz_name', 'quiz_description', 'question_ids', 'section'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quiz_id' => Yii::t('cms', 'Quiz ID'),
            'quiz_name' => Yii::t('cms', 'Quiz Name'),
            'quiz_description' => Yii::t('cms', 'Quiz Description'),
            'quiz_type_id' => Yii::t('cms', 'Quiz Type ID'),
            'quiz_level' => Yii::t('cms', 'Quiz Level'),
            'subject_id' => Yii::t('cms', 'Subject ID'),
            'class_level_id' => Yii::t('cms', 'Class Level ID'),
            'question_ids' => Yii::t('cms', 'Question Ids'),
            'section' => Yii::t('cms', 'Section'),
            'status' => Yii::t('cms', 'Status'),
            'price' => Yii::t('cms', 'Price'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
            'created_by' => Yii::t('cms', 'Created By'),
            'updated_by' => Yii::t('cms', 'Updated By'),
            'time' => Yii::t('cms', 'Time'),
        ];
    }
}
