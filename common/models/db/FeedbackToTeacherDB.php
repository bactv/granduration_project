<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "feedback_to_teacher".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $teacher_id
 * @property integer $status_view
 * @property string $created_time
 * @property integer $created_by
 */
class FeedbackToTeacherDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback_to_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'teacher_id'], 'required'],
            [['content'], 'string'],
            [['teacher_id', 'status_view', 'created_by'], 'integer'],
            [['created_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'title' => Yii::t('cms', 'Title'),
            'content' => Yii::t('cms', 'Content'),
            'teacher_id' => Yii::t('cms', 'Teacher ID'),
            'status_view' => Yii::t('cms', 'Status View'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'created_by' => Yii::t('cms', 'Created By'),
        ];
    }
}
