<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property integer $id
 * @property string $username
 * @property string $ip
 * @property string $device
 * @property string $created_time
 */
class SessionDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_time'], 'safe'],
            [['username', 'ip', 'device'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'username' => Yii::t('cms', 'Username'),
            'ip' => Yii::t('cms', 'Ip'),
            'device' => Yii::t('cms', 'Device'),
            'created_time' => Yii::t('cms', 'Created Time'),
        ];
    }
}
