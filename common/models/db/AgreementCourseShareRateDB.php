<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "agreement_course_share_rate".
 *
 * @property integer $agreement_id
 * @property integer $course_id
 * @property integer $share_rate
 */
class AgreementCourseShareRateDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agreement_course_share_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_id', 'course_id'], 'required'],
            [['agreement_id', 'course_id', 'share_rate'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'agreement_id' => Yii::t('cms', 'Agreement ID'),
            'course_id' => Yii::t('cms', 'Course ID'),
            'share_rate' => Yii::t('cms', 'Share Rate'),
        ];
    }
}
