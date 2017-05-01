<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "course_news".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $created_time
 */
class CourseNewsDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'title'], 'required'],
            [['course_id', 'status'], 'integer'],
            [['created_time'], 'safe'],
            [['title', 'content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'course_id' => Yii::t('cms', 'Course ID'),
            'title' => Yii::t('cms', 'Title'),
            'content' => Yii::t('cms', 'Content'),
            'status' => Yii::t('cms', 'Status'),
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
