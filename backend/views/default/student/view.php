<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = $model->std_full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->std_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->std_id], [
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
            'std_id',
            'std_username',
            'std_full_name',
            'std_phone',
            'std_birthday',
            'std_school_name',
            [
                'attribute' => 'std_balance',
                'value' => number_format($model['std_balance'])
            ],
            [
                'attribute' => 'std_status',
                'value' => ($model['std_status'] == 1) ? 'Active' : 'Inactive'
            ],
            'std_created_time',
            'std_updated_time',
        ],
    ]) ?>

</div>
