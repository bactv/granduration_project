<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = $model->ad_group_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-group-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->ad_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->ad_group_id], [
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
            'ad_group_id',
            'ad_group_name',
            'ad_group_description',
            'ad_group_action_ids',
            'ad_group_status',
            'ad_group_created_time',
            'ad_group_updated_time',
        ],
    ]) ?>

</div>
