<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;


class Agreement extends \common\models\AgreementBase
{
    public function behaviors()
    {
        return array(
            array(
                'class' => TimestampBehavior::class,
                'attributes' => array(
                    self::EVENT_BEFORE_INSERT => array('agreement_created_time', 'agreement_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('agreement_updated_time')
                )
            ),
            array(
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'agreement_created_by',
                'updatedByAttribute' => 'agreement_updated_by',
            ),
        );
    }

    public static function findByIdentify($condition)
    {
        return self::find()->where($condition)->one();
    }

    public static function getAttributeValue($conditions, $attr_return)
    {
        $object = self::find()->where($conditions)->one();
        if (!empty($object) && isset($object->{$attr_return})) {
            return $object->{$attr_return};
        }
        return '';
    }
}