<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use leandrogehlen\treegrid\TreeGrid;
use yii\helpers\Url;
use yii\bootstrap\Dropdown;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>Icon::show('plus') . " " . Yii::t('cms', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>Icon::show('trash-o') . " " . Yii::t('cms', 'Delete'), 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

<div class="dropdown" style="margin-bottom: 20px">
    <?php echo Html::dropDownList('', $module, [1 => 'BACKEND', 2 => 'FRONTEND'], [
        'class' => 'btn btn-default',
        'onchange' => 'list_menu(this.value)'
    ]) ?>
</div>

<?php Pjax::begin(['id' => 'admin-grid-view']);?>
<div class="grid-view">
    <?= TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName' => 'id',
        'parentColumnName' => 'parent_id',
        'parentRootValue' => '0', //first parentId value
        'pluginOptions' => [
        ],
        'columns' => [
            [
                'attribute' => 'name',
                'options' => ['width' => '200px']
            ],
            [
                'attribute' => 'url',
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['status'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['menu/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['menu/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
                    }
                },
                'headerOptions' => ['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center;'],
            ],
            [
                'attribute' => 'visible',
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['visible'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-check" style="color: red;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-dot-circle-o" style="color: green;"></i></a></div>';
                    }
                },
                'headerOptions' => ['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center;'],
            ],
            [
                'format' => 'raw',
                'header' => Yii::t('cms', 'Actions'),
                'value' => function ($model) {
                    $view = Html::a(Icon::show('info-circle'), Url::toRoute(['/menu/' . $model->id]), [
                        'title' => 'View',
                        'class'=>'btn btn-primary btn-xs btn-app',
                        'data-pjax' => '0',
                    ]);
                    $update = Html::a(Icon::show('pencil-square-o'), Url::toRoute(['/menu/update/' . $model->id]), [
                        'title' => 'Update',
                        'class'=>'btn btn-primary btn-xs btn-app',
                        'data-pjax' => '0',
                    ]);
                    $delete = Html::a(Icon::show('trash-o'), Url::toRoute(['/menu/delete/' . $model->id]), [
                        'title' => 'Delete',
                        'class'=>'btn btn-primary btn-xs btn-app',
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                        'data-pjax' => 'w0'
                    ]);
                    return $view . ' ' . $update . ' ' . $delete;
                },
                'headerOptions' => ['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center;'],
            ],
        ]
    ]); ?>
</div>

<?php Pjax::end();?> 