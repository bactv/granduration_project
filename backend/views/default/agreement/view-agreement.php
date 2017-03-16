<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 16/03/2017
 * Time: 9:47 CH
 */

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\icons\Icon;
use common\components\Utility;
use backend\models\Party;
use backend\models\AgreementType;
use backend\models\AgreementRight;
use backend\models\Admin;

Icon::map($this, Icon::FA);

?>

<div class="agreement-view">

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model['agreement_id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model['agreement_id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('cms', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'agreement_id'
            ],
            [
                'attribute' => 'agreement_code'
            ],
            [
                'attribute' => 'party_id_a',
                'value' => Party::getAttributeValue(['party_id' => $model['party_id_a']], 'party_name')
            ],
            [
                'attribute' => 'party_id_b',
                'value' => Party::getAttributeValue(['party_id' => $model['party_id_b']], 'party_name')
            ],
            [
                'attribute' => 'agreement_signed_date',
                'value' => Utility::formatDataTime($model['agreement_signed_date'], '-', '/', false)
            ],
            [
                'attribute' => 'agreement_effective_date',
                'value' => Utility::formatDataTime($model['agreement_effective_date'], '-', '/', false)
            ],
            [
                'attribute' => 'agreement_right_id',
                'label' => Yii::t('cms', 'Agreement Rights'),
                'value' => AgreementRight::getAttributeValue(['agreement_right_id' => $model['agreement_right_id']], 'agreement_right_name')
            ],
            [
                'attribute' => 'agreement_type_id',
                'label' => Yii::t('cms', 'Agreement Types'),
                'value' => AgreementType::getAttributeValue(['agreement_type_id' => $model['agreement_type_id']], 'agreement_type_name')
            ],
            [
                'attribute' => 'mg',
                'value' => $model['mg'] != '' ? number_format($model['mg'], 2) : $model['mg']
            ],
            [
                'attribute' => 'agreement_created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'value' => Utility::formatDataTime($model['agreement_created_time'], '-', '/', true)
            ],
            [
                'attribute' => 'agreement_updated_time',
                'label' => Yii::t('cms', 'Updated Time'),
                'value' => Utility::formatDataTime($model['agreement_updated_time'], '-', '/', true)
            ],
            [
                'attribute' => 'agreement_created_by',
                'label' => Yii::t('cms', 'Created By'),
                'value' => Admin::getAttributeValue(['ad_id' => $model['agreement_created_by']], 'ad_username')
            ],
            [
                'attribute' => 'agreement_updated_by',
                'label' => Yii::t('cms', 'Updated By'),
                'value' => Admin::getAttributeValue(['ad_id' => $model['agreement_updated_by']], 'ad_username')
            ]
        ],
    ]) ?>

</div>
