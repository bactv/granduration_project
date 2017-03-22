<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $question_id
 * @property string $question_content
 * @property integer $status
 */
class QuestionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['question_content'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => Yii::t('cms', 'Question ID'),
            'question_content' => Yii::t('cms', 'Question Content'),
            'status' => Yii::t('cms', 'Status'),
        ];
    }
}
