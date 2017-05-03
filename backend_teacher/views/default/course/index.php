<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use backend_teacher\models\ClassLevel;
use backend_teacher\models\Subject;
use yii\bootstrap\Alert;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>Icon::show('plus') . " " . Yii::t('app', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>Icon::show('trash-o') . " " . Yii::t('app', 'Delete'), 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

<?php if (Yii::$app->session->hasFlash('error')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-danger'],
        'body' => Yii::$app->session->getFlash('error'),
    ]);
} else if (Yii::$app->session->hasFlash('success')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-success'],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
} ?>

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
                'attribute' => 'course_name',
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'course_type_id',
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' => function ($model) {
                    return number_format($model['price']);
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'privacy',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['privacy'] == 1) ? 'Công khai' : 'Riêng tư';
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model['status'] == 1) {
                        return 'Đang active';
                    } else if ($model['status'] == 2) {
                        return 'Đã kết thúc';
                    } else if ($model['status'] == 3) {
                        return 'Đã hủy';
                    }
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'approved',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model['approved'] == 0) {
                        return 'Đang chờ phê duyệt';
                    } else if ($model['approved'] == 1) {
                        return 'Đã phê duyệt';
                    } else if ($model['approved'] == -1) {
                        return 'Đã từ chối phê duyệt';
                    }
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'subject_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Subject::getAttributeValue(['subject_id' => $model['subject_id']], 'subject_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: center'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: center'],
            ],
            [
                'attribute' => 'class_level_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return ClassLevel::getAttributeValue(['class_level_id' => $model['class_level_id']], 'class_level_name');
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