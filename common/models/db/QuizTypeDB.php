<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "quiz_type".
 *
 * @property integer $quiz_type_id
 * @property string $quiz_type_name
 * @property string $quiz_type_description
 * @property integer $number_quiz
 */
class QuizTypeDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number_quiz'], 'integer'],
            [['quiz_type_name', 'quiz_type_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'quiz_type_id' => Yii::t('cms', 'Quiz Type ID'),
            'quiz_type_name' => Yii::t('cms', 'Quiz Type Name'),
            'quiz_type_description' => Yii::t('cms', 'Quiz Type Description'),
            'number_quiz' => Yii::t('cms', 'Number Quiz'),
        ];
    }
}
