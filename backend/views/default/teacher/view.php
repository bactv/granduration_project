<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use backend\models\Admin;
use backend\models\Degree;
use common\components\Utility;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Teacher */

$this->title = $model->tch_full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->tch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->tch_id], [
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
            'tch_id',
            'tch_username',
            'tch_full_name',
            [
                'attribute' => 'tch_gender',
                'value' => ($model['tch_gender'] == 1) ? 'Nam' : 'Nữ',
            ],
            [
                'attribute' => 'tch_intro',
                'format' => 'html'
            ],
            'tch_work_place',
            [
                'attribute' => 'tch_degree',
                'value' => Degree::getAttributeValue(['id' => $model['tch_degree']], 'degree_name')
            ],
            'tch_email',
            [
                'attribute' => 'tch_status',
                'value' => ($model['tch_status'] == 1) ? 'Active' : 'Inactive',
            ],
            [
                'attribute' => 'tch_created_time',
                'value' => Utility::formatDataTime($model['tch_created_time'], '-', '/', true),
            ],
            [
                'attribute' => 'tch_updated_time',
                'value' => Utility::formatDataTime($model['tch_updated_time'], '-', '/', true),
            ]
        ],
    ]) ?>

</div>
