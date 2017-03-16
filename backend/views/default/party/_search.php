<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PartySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="party-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'party_id') ?>

    <?= $form->field($model, 'party_type_id') ?>

    <?= $form->field($model, 'party_name') ?>

    <?= $form->field($model, 'party_rep_title') ?>

    <?= $form->field($model, 'party_address') ?>

    <?php // echo $form->field($model, 'party_tax_code') ?>

    <?php // echo $form->field($model, 'party_phone') ?>

    <?php // echo $form->field($model, 'party_created_time') ?>

    <?php // echo $form->field($model, 'party_updated_time') ?>

    <?php // echo $form->field($model, 'party_created_by') ?>

    <?php // echo $form->field($model, 'party_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
