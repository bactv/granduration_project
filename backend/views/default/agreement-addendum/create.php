<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AgreementAddendum */

$this->title = Yii::t('cms', 'Create {modelClass}', [
    'modelClass' => 'Agreement Addendum',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Agreement Addendums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " .Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="agreement-addendum-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

