<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\AgreementAddendum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agreement-addendum-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'agreement_id')->textInput() ?>

    <?= $form->field($model, 'addendum_number')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'addendum_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'addendum_created_time')->textInput() ?>

    <?= $form->field($model, 'addendum_updated_time')->textInput() ?>

    <?= $form->field($model, 'addendum_created_by')->textInput() ?>

    <?= $form->field($model, 'addendum_updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
