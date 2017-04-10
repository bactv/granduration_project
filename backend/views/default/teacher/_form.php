<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use mihaildev\ckeditor\CKEditor;
use backend\models\Degree;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ],
        'options' => [
            'enctype' => 'multipart/form-data',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => [
                'validateOnSubmit'=>true,
            ]
        ],
    ]); ?>

    <?php if (!$model->isNewRecord) { ?>
        <?= $form->field($model, 'tch_username')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'newPassword')->passwordInput()->label(Yii::t('cms', 'New Password')) ?>
    <?php } ?>

    <?= $form->field($model, 'tch_full_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tch_gender')->dropDownList([1 => 'Nam', 2 => 'Nữ']) ?>

    <?= $form->field($model, 'tch_intro')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            'inline' => false,
            'rows' => 5
        ],
    ]) ?>

    <?= $form->field($model, 'tch_work_place')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tch_degree')->dropDownList(ArrayHelper::map(Degree::find()->all(), 'id', 'degree_name')) ?>

    <?= $form->field($model, 'tch_email')->textInput(['maxlength' => 255, 'type' => 'email']) ?>

    <?= $form->field($model, 'tch_status')->checkbox(['label' => false])->label(Yii::t('cms', 'Status')) ?>

    <?= $form->field($model, 'avatar')->widget(FileInput::className(), [
        'options'=>[
            'multiple' => false
        ],
        'pluginOptions' => [
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
