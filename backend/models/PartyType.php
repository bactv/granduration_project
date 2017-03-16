<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;


class PartyType extends \common\models\PartyTypeBase
{
    public function behaviors()
    {
        return array(
            array(
                'class' => TimestampBehavior::class,
                'attributes' => array(
                    self::EVENT_BEFORE_INSERT => array('party_type_created_time', 'party_type_updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('party_type_updated_time')
                )
            ),
            array(
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'party_type_created_by',
                'updatedByAttribute' => 'party_type_updated_by',
            )
        );
    }
}