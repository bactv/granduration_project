<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "quiz_attempt".
 *
 * @property integer $id
 * @property integer $quiz_id
 * @property string $content
 * @property string $created_time
 */
class QuizAttemptDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_attempt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quiz_id'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['created_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'quiz_id' => Yii::t('cms', 'Quiz ID'),
            'content' => Yii::t('cms', 'Content'),
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
