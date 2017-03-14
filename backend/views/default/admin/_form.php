<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\select2\Select2;
use backend\models\AdminGroup;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'ad_username')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'ad_password')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ad_full_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ad_email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ad_profession')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ad_birthday')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'options' => [
            'placeholder' => 'dd/mm/yyyy',
        ],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'ad_group_ids')->widget(Select2::className(), [
        'data' => ArrayHelper::map(AdminGroup::getAllAdminGroups(['ad_group_status' => 1]), 'ad_group_id', 'ad_group_name'),
        'options' => [
            'multiple' => true,
            'placeholder' => 'Chọn danh sách nhóm quyền ...',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'ad_status')->textInput() ?>

    <?= $form->field($model, 'avatar')->widget(FileInput::className(), [
        'options'=>[
            'multiple' => false
        ],
        'pluginOptions' => [
            'initialPreview'=>[
                "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg"
            ],
            'initialPreviewAsData' => true,
            'initialCaption' => "The Moon and the Earth",
            'initialPreviewConfig' => [
                ['caption' => 'Moon.jpg', 'size' => '873727'],
            ],
            'overwriteInitial' => false,
            'maxFileSize' => 2800
        ]
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
