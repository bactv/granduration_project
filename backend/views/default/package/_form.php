<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use mihaildev\ckeditor\CKEditor;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'pk_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'pk_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'pk_description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            'inline' => false,
            'rows' => 5
        ],
    ]) ?>

    <?= $form->field($model, 'pk_price')->textInput(['maxlength' => 10, 'type' => 'number', 'min' => 0]) ?>

    <?= $form->field($model, 'pk_status')->checkbox(['label' => false])->label(Yii::t('cms', 'Status')) ?>

    <?= $form->field($model, 'pk_deleted')->checkbox(['label' => false])->label(Yii::t('cms', 'Deleted')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
