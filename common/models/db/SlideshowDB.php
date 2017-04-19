<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "slideshow".
 *
 * @property integer $id
 * @property string $alt
 * @property string $url
 * @property integer $status
 */
class SlideshowDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slideshow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['alt', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'alt' => Yii::t('cms', 'Alt'),
            'url' => Yii::t('cms', 'Url'),
            'status' => Yii::t('cms', 'Status'),
        ];
    }
}
