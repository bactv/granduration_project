<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AdminGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ad_group_id') ?>

    <?= $form->field($model, 'ad_group_name') ?>

    <?= $form->field($model, 'ad_group_description') ?>

    <?= $form->field($model, 'ad_group_action_ids') ?>

    <?= $form->field($model, 'ad_group_status') ?>

    <?php // echo $form->field($model, 'ad_group_created_time') ?>

    <?php // echo $form->field($model, 'ad_group_updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
