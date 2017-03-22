<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\QuizType */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
    'modelClass' => 'Quiz Type',
]) . ' ' . $model->quiz_type_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Quiz Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="quiz-type-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
