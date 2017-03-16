<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\PartyTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="party-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'party_type_id') ?>

    <?= $form->field($model, 'party_type_name') ?>

    <?= $form->field($model, 'party_type_description') ?>

    <?= $form->field($model, 'party_type_created_time') ?>

    <?= $form->field($model, 'party_type_updated_time') ?>

    <?php // echo $form->field($model, 'party_type_created_by') ?>

    <?php // echo $form->field($model, 'party_type_updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
