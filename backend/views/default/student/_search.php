<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'std_id') ?>

    <?= $form->field($model, 'std_username') ?>

    <?= $form->field($model, 'std_password') ?>

    <?= $form->field($model, 'std_full_name') ?>

    <?= $form->field($model, 'std_phone') ?>

    <?php // echo $form->field($model, 'std_birthday') ?>

    <?php // echo $form->field($model, 'std_school_name') ?>

    <?php // echo $form->field($model, 'std_balance') ?>

    <?php // echo $form->field($model, 'std_status') ?>

    <?php // echo $form->field($model, 'std_created_time') ?>

    <?php // echo $form->field($model, 'std_updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
