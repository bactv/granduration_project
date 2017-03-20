<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\ImportFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="import-file-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ],
        'options' => [
                'enctype' => 'multipart/form-data'
        ]
    ]); ?>


    <?= $form->field($model, 'type')->dropDownList(Yii::$app->params['type_file_import'])->label(Yii::t('cms', 'Type File Import')) ?>

    <?php echo $form->field($model, 'file')->widget(FileInput::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
