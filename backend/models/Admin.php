<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;


class Admin extends \common\models\AdminBase
{
    public $avatar;
    /**
     * Behaviors
     * @return array
     */
    public function behaviors()
    {
        return array(
            array(
                'class' => TimestampBehavior::class,
                'attributes' => array(
                    self::EVENT_BEFORE_INSERT => array('ad_created_time', 'ad_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('ad_updated_time')
                )
            ),
        );
    }

    /**
     * Get admin identify
     * @param array $conditions
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getAdmin($conditions = array())
    {
        return self::find()->where($conditions)->one();
    }
}