<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $module
 * @property string $url
 * @property string $icon
 * @property integer $visible
 * @property integer $status
 * @property string $created_time
 * @property string $updated_time
 */
class MenuDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'module', 'visible', 'status'], 'integer'],
            [['name'], 'required'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 30]
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
            'name' => Yii::t('cms', 'Name'),
            'module' => Yii::t('cms', 'Module'),
            'url' => Yii::t('cms', 'Url'),
            'icon' => Yii::t('cms', 'Icon'),
            'visible' => Yii::t('cms', 'Visible'),
            'status' => Yii::t('cms', 'Status'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
        ];
    }
}
