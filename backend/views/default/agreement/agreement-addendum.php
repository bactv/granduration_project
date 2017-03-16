<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 16/03/2017
 * Time: 9:47 CH
 */

use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Html;
use kartik\icons\Icon;
use backend\models\Agreement;
use common\components\Utility;

Icon::map($this, Icon::FA);

?>

<?php Pjax::begin(['id' => 'admin-grid-view']);?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\CheckboxColumn',
            'options' => ['width' => '50px'],
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
        ],
        [
            'attribute' => 'addendum_id',
            'options' => ['width' => '50px'],
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
        ],
        [
            'attribute' => 'agreement_id',
            'options' => ['width' => '150px'],
            'label' => Yii::t('cms', 'Agreement Code'),
            'format' => 'raw',
            'value' => function ($model) {
                return Agreement::getAttributeValue(['agreement_id' => $model['agreement_id']], 'agreement_code');
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
        ],
        [
            'attribute' => 'addendum_number',
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
        ],
        [
            'attribute' => 'addendum_content',
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
        ],
        [
            'attribute' => 'addendum_created_time',
            'label' => Yii::t('cms', 'Created Time'),
            'format' => 'raw',
            'value' => function ($model) {
                return Utility::formatDataTime($model['addendum_created_time'], '-', '/', true);
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
        ],
        [
            'attribute' => 'addendum_updated_time',
            'label' => Yii::t('cms', 'Updated Time'),
            'format' => 'raw',
            'value' => function ($model) {
                return Utility::formatDataTime($model['addendum_updated_time'], '-', '/', true);
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'header' => Yii::t('cms', 'Actions'),
            'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
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
