<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $content
 * @property integer $response
 * @property integer $created_by
 * @property integer $response_by
 * @property string $created_time
 * @property string $updated_time
 * @property integer $deleted
 */
class FeedbackDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'response', 'created_by', 'response_by', 'deleted'], 'integer'],
            [['content'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['content'], 'string', 'max' => 700]
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
            'content' => Yii::t('cms', 'Content'),
            'response' => Yii::t('cms', 'Response'),
            'created_by' => Yii::t('cms', 'Created By'),
            'response_by' => Yii::t('cms', 'Response By'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
            'deleted' => Yii::t('cms', 'Deleted'),
        ];
    }
}
