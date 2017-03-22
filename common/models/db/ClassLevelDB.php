<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "class_level".
 *
 * @property integer $class_level_id
 * @property string $class_level_name
 */
class ClassLevelDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_level_name'], 'required'],
            [['class_level_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'class_level_id' => Yii::t('cms', 'Class Level ID'),
            'class_level_name' => Yii::t('cms', 'Class Level Name'),
        ];
    }
}
