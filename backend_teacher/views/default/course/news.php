<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 8:53 SA
 */
use yii\widgets\Pjax;
use yii\grid\GridView;
use common\components\Utility;
use kartik\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

?>
<?php Pjax::begin(['id' => 'admin-grid-view']);?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\CheckboxColumn',
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
        ],
        [
            'attribute' => 'title',
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
        ],
        [
            'attribute' => 'content',
            'format' => 'raw',
            'value' => function ($model) {
                return Utility::truncateStringWords($model['content'], 200);
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'vertical-align: center'],
        ],
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model['status'] == 1) {
                    return 'Active';
                } else  {
                    return 'Inactive';
                }
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
        ],
        [
            'attribute' => 'created_time',
            'format' => 'raw',
            'value' => function ($model) {
                return Utility::formatDataTime($model['created_time'], '-', '/', true);
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
        ],
        [
            'attribute' => 'updated_time',
            'format' => 'raw',
            'value' => function ($model) {
                return Utility::formatDataTime($model['updated_time'], '-', '/', true);
            },
            'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
            'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'header' => Yii::t('cms', 'Actions'),
            'headerOptions' => ['style'=>'text-align: center;'],
            'contentOptions'=>['style'=>'text-align: center;'],
            'options' => ['width' => '120px'],
            'buttons' => [
                'view' => function ($url) {
                    return Html::a(Icon::show('info-circle'), $url, [
                        'title' => Yii::t('app', 'View'),
                        'class'=>'btn btn-primary btn-xs btn-app',
                        'data-pjax' => '0',
                    ]);
                },
                'update' => function ($url) {
                    return Html::a(Icon::show('pencil-square-o'), $url, [
                        'title' => Yii::t('app', 'Update'),
                        'class'=>'btn btn-primary btn-xs btn-app',
                        'data-pjax' => '0',
                    ]);
                },
                'delete' => function ($url) {
                    return Html::a(Icon::show('trash-o'), $url, [
                        'title' => Yii::t('app', 'Delete'),
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
