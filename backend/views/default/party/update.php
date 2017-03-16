<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Party */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
    'modelClass' => 'Party',
]) . ' ' . $model->party_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Parties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="party-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
