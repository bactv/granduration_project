<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tch_id') ?>

    <?= $form->field($model, 'tch_username') ?>

    <?= $form->field($model, 'tch_password') ?>

    <?= $form->field($model, 'tch_full_name') ?>

    <?= $form->field($model, 'tch_gender') ?>

    <?php // echo $form->field($model, 'tch_intro') ?>

    <?php // echo $form->field($model, 'tch_work_place') ?>

    <?php // echo $form->field($model, 'tch_degree') ?>

    <?php // echo $form->field($model, 'tch_email') ?>

    <?php // echo $form->field($model, 'tch_status') ?>

    <?php // echo $form->field($model, 'tch_created_time') ?>

    <?php // echo $form->field($model, 'tch_updated_time') ?>

    <?php // echo $form->field($model, 'tch_created_by') ?>

    <?php // echo $form->field($model, 'tch_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
