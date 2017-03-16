<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Agreement */

$this->title = Yii::t('cms', 'Create Agreement', [
    'modelClass' => 'Agreement',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Agreements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " .Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="agreement-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

