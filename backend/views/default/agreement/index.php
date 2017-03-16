<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use backend\models\Party;
use common\components\Utility;
use backend\models\AgreementRight;
use backend\models\AgreementType;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AgreementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Agreements');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>Icon::show('plus') . " " . Yii::t('cms', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>Icon::show('trash-o') . " " . Yii::t('cms', 'Delete'), 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['width' => '50px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_id',
                'options' => ['width' => '50px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_code',
                'options' => ['width' => '150px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'party_id_a',
                'options' => ['width' => '100px'],
                'format' => 'raw',
                'value' => function ($model) {
                    return Party::getAttributeValue(['party_id' => $model['party_id_a']], 'party_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'party_id_b',
                'options' => ['width' => '100px'],
                'format' => 'raw',
                'value' => function ($model) {
                    return Party::getAttributeValue(['party_id' => $model['party_id_b']], 'party_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_signed_date',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['agreement_signed_date'], '-', '/', false);
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_effective_date',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['agreement_effective_date'], '-', '/', false);
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_right_id',
                'label' => Yii::t('cms', 'Agreement Rights'),
                'format' => 'raw',
                'value' => function ($model) {
                    return AgreementRight::getAttributeValue(['agreement_right_id' => $model['agreement_right_id']], 'agreement_right_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'agreement_type_id',
                'label' => Yii::t('cms', 'Agreement Types'),
                'format' => 'raw',
                'value' => function ($model) {
                    return AgreementType::getAttributeValue(['agreement_type_id' => $model['agreement_type_id']], 'agreement_type_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'mg',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['mg'] != '' ? number_format($model['mg'], 2) : $model['mg']);
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => Yii::t('cms', 'Actions'),
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'options' => ['width' => '120px'],
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(Icon::show('info-circle'), $url, [
                            'title' => Yii::t('cms', 'View'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a(Icon::show('pencil-square-o'), $url, [
                            'title' => Yii::t('cms', 'Update'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a(Icon::show('trash-o'), $url, [
                            'title' => Yii::t('cms', 'Delete'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => 'w0'
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 