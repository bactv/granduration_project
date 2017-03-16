<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AgreementAddendumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agreement-addendum-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'addendum_id') ?>

    <?= $form->field($model, 'agreement_id') ?>

    <?= $form->field($model, 'addendum_number') ?>

    <?= $form->field($model, 'addendum_content') ?>

    <?= $form->field($model, 'addendum_created_time') ?>

    <?php // echo $form->field($model, 'addendum_updated_time') ?>

    <?php // echo $form->field($model, 'addendum_created_by') ?>

    <?php // echo $form->field($model, 'addendum_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
