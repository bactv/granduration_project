<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class AdminGroup extends \common\models\AdminGroupBase
{
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
                    self::EVENT_BEFORE_INSERT => array('ad_group_created_time', 'ad_group_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('ad_group_updated_time')
                )
            ),
        );
    }

    /**
     * Get all Admin Group
     * @param array $conditions
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllAdminGroups($conditions = array())
    {
        return self::find()->where($conditions)->asArray()->all();
    }

    /**
     * Get Admin Group
     * @param array $conditions
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAdminGroup($conditions = array())
    {
        return self::find()->where($conditions)->one();
    }
}