<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;


class AdminController extends \common\models\AdminControllerBase
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
                    self::EVENT_BEFORE_INSERT => array('ad_controller_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('ad_controller_updated_time')
                )
            ),
        );
    }

    /**
     * Get All AdminController in system
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllAdminControllers()
    {
        return self::find()->asArray()->all();
    }

    /**
     * Find One Admin Controller
     * @param array $conditions
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getAdminController($conditions = array())
    {
        return self::find()->where($conditions)->one();
    }
}