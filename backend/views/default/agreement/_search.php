<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AgreementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agreement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'agreement_id') ?>

    <?= $form->field($model, 'agreement_code') ?>

    <?= $form->field($model, 'party_id_a') ?>

    <?= $form->field($model, 'party_id_b') ?>

    <?= $form->field($model, 'agreement_signed_date') ?>

    <?php // echo $form->field($model, 'agreement_effective_date') ?>

    <?php // echo $form->field($model, 'agreement_right_id') ?>

    <?php // echo $form->field($model, 'agreement_type_id') ?>

    <?php // echo $form->field($model, 'mg') ?>

    <?php // echo $form->field($model, 'agreement_created_time') ?>

    <?php // echo $form->field($model, 'agreement_updated_time') ?>

    <?php // echo $form->field($model, 'agreement_created_by') ?>

    <?php // echo $form->field($model, 'agreement_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
