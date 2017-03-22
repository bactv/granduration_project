<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use backend\models\Subject;
use backend\models\QuizType;
use backend\models\ClassLevel;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\QuizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Quizzes');
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
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['width' => '50px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'quiz_id',
                'options' => ['width' => '50px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'quiz_name',
                'options' => ['width' => '150px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'quiz_description',
                'options' => ['width' => '150px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'quiz_type_id',
                'label' => Yii::t('cms', 'Quiz Types'),
                'format' => 'raw',
                'value' => function ($model) {
                    return QuizType::getAttributeValue(['quiz_type_id' => $model['quiz_type_id']], 'quiz_type_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'subject_id',
                'label' => Yii::t('cms', 'Subjects'),
                'format' => 'raw',
                'value' => function ($model) {
                    return Subject::getAttributeValue(['subject_id' => $model['subject_id']], 'subject_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'class_level_id',
                'label' => Yii::t('cms', 'Class Levels'),
                'format' => 'raw',
                'value' => function ($model) {
                    return ClassLevel::getAttributeValue(['class_level_id' => $model['class_level_id']], 'class_level_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'section',
                'options' => ['width' => '150px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['status'] == 1 ? 'Active' : 'Deactive');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: left; vertical-align: middle'],
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