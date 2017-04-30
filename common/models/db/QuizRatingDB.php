<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "quiz_rating".
 *
 * @property integer $id
 * @property integer $quiz_id
 * @property integer $student_id
 * @property string $user_ip
 * @property integer $rate
 * @property string $date
 */
class QuizRatingDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quiz_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quiz_id'], 'required'],
            [['quiz_id', 'student_id', 'rate'], 'integer'],
            [['date'], 'safe'],
            [['user_ip'], 'string', 'max' => 255]
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
            'student_id' => Yii::t('cms', 'Student ID'),
            'user_ip' => Yii::t('cms', 'User Ip'),
            'rate' => Yii::t('cms', 'Rate'),
            'date' => Yii::t('cms', 'Date'),
        ];
    }
}
