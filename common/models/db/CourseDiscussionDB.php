<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_discussion".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $course_id
 * @property integer $lesson_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $content
 * @property string $created_time
 */
class CourseDiscussionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_discussion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'course_id', 'lesson_id', 'user_id'], 'integer'],
            [['course_id', 'user_id', 'user_name', 'content'], 'required'],
            [['content'], 'string'],
            [['created_time'], 'safe'],
            [['user_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'parent_id' => Yii::t('cms', 'Parent ID'),
            'course_id' => Yii::t('cms', 'Course ID'),
            'lesson_id' => Yii::t('cms', 'Lesson ID'),
            'user_id' => Yii::t('cms', 'User ID'),
            'user_name' => Yii::t('cms', 'User Name'),
            'content' => Yii::t('cms', 'Content'),
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
