<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "degree".
 *
 * @property integer $id
 * @property string $abb_name
 * @property string $degree_name
 */
class DegreeDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'degree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abb_name', 'degree_name'], 'required'],
            [['abb_name', 'degree_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'abb_name' => Yii::t('cms', 'Abb Name'),
            'degree_name' => Yii::t('cms', 'Degree Name'),
        ];
    }
}
