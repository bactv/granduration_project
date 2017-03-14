<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ad_id') ?>

    <?= $form->field($model, 'ad_username') ?>

    <?= $form->field($model, 'ad_password') ?>

    <?= $form->field($model, 'ad_full_name') ?>

    <?= $form->field($model, 'ad_email') ?>

    <?php // echo $form->field($model, 'ad_profession') ?>

    <?php // echo $form->field($model, 'ad_birthday') ?>

    <?php // echo $form->field($model, 'ad_avatar') ?>

    <?php // echo $form->field($model, 'ad_status') ?>

    <?php // echo $form->field($model, 'ad_last_active_time') ?>

    <?php // echo $form->field($model, 'ad_created_by') ?>

    <?php // echo $form->field($model, 'ad_updated_by') ?>

    <?php // echo $form->field($model, 'ad_created_time') ?>

    <?php // echo $form->field($model, 'ad_updated_time') ?>

    <?php // echo $form->field($model, 'ad_group_ids') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
