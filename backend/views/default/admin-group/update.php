<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
    'modelClass' => 'Admin Group',
]) . ' ' . $model->ad_group_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="admin-group-update">
    <?= $this->render('_form', [
        'model' => $model,
        'actions_ids' => $actions_ids
    ]) ?>

</div>
