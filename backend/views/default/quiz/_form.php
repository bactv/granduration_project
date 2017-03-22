<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Quiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'quiz_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'quiz_description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'quiz_type_id')->textInput() ?>

    <?= $form->field($model, 'quiz_level')->dropDownList([ 'hard' => 'Hard', 'normal' => 'Normal', 'easy' => 'Easy', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <?= $form->field($model, 'class_level_id')->textInput() ?>

    <?= $form->field($model, 'question_ids')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'updated_time')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
