<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AgreementType */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
    'modelClass' => 'Agreement Type',
]) . ' ' . $model->agreement_type_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Agreement Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="agreement-type-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
