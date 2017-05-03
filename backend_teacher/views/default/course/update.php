<?php

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend_teacher\models\Course */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Course',
]) . ' ' . $model->course_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->params['title'] = Yii::t('app', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('app', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="course-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
