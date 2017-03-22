<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'std_username')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'std_password')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'std_full_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'std_phone')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'std_birthday')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'std_school_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'std_balance')->textInput() ?>

    <?= $form->field($model, 'std_status')->textInput() ?>

    <?= $form->field($model, 'std_created_time')->textInput() ?>

    <?= $form->field($model, 'std_updated_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
