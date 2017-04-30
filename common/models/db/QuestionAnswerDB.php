<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "question_answer".
 *
 * @property integer $ans_id
 * @property integer $question_id
 * @property string $question_content
 * @property string $ans_content
 * @property integer $is_true
 * @property string $soluion
 */
class QuestionAnswerDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id'], 'required'],
            [['question_id', 'is_true'], 'integer'],
            [['soluion'], 'string'],
            [['question_content'], 'string', 'max' => 500],
            [['ans_content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ans_id' => Yii::t('cms', 'Ans ID'),
            'question_id' => Yii::t('cms', 'Question ID'),
            'question_content' => Yii::t('cms', 'Question Content'),
            'ans_content' => Yii::t('cms', 'Ans Content'),
            'is_true' => Yii::t('cms', 'Is True'),
            'soluion' => Yii::t('cms', 'Soluion'),
        ];
    }
}
