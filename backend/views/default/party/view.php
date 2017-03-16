<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Party */

$this->title = $model->party_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Parties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="party-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->party_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->party_id], [
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
            'party_id',
            'party_type_id',
            'party_name',
            'party_rep_title',
            'party_address',
            'party_tax_code',
            'party_phone',
            'party_created_time',
            'party_updated_time',
            'party_created_by',
            'party_updated_by',
        ],
    ]) ?>

</div>
