<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\select2\Select2;
use backend\models\Menu;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList((array)Menu::getCategoryMenuTree(Menu::getAllMenus(), 0, 0), [
        'prompt' => 'Select a parent menu...'
    ]); ?>

    <?= $form->field($model, 'module')->dropDownList([1 => 'Backend', 2 => 'Frontend']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'visible')->checkbox(['label' => false])->label(Yii::t('cms', 'Visible') . ' (Hiện | Ẩn)') ?>

    <?= $form->field($model, 'status')->checkbox(['label' => false])->label(Yii::t('cms', 'Status')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
