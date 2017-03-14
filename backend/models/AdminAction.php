<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class AdminAction extends \common\models\AdminActionBase
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
                    self::EVENT_BEFORE_INSERT => array('ad_action_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('ad_action_updated_time')
                )
            ),
        );
    }

    /**
     * Get All Admin Actions
     * @param $conditions array
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllAdminActions($conditions = array())
    {
        return self::find()->where($conditions)->asArray()->all();
    }

    /**
     * Get admin action
     * @param array $conditions
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getAdminAction($conditions = array())
    {
        return self::find()->where($conditions)->one();
    }
}