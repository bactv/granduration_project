<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Feedback */

$this->title = Yii::t('cms', 'Create {modelClass}', [
    'modelClass' => 'Feedback',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " .Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="feedback-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

