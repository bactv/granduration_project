<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/05/2017
 * Time: 12:29 SA
 */
use kartik\form\ActiveForm;
use yii\helpers\Url;
use kartik\icons\Icon;
use yii\helpers\Html;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

?>

<div class="form_update">
    <fieldset>
        <legend>Cập nhật</legend>
        <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => [
                'labelSpan' => 3,
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
        ]) ?>

        <?php echo $form->field($lesson, 'lesson_name')->textInput() ?>
        <?php echo $form->field($lesson, 'lesson_desc')->textarea(['rows' => 6]) ?>
        <?php echo $form->field($lesson, 'status')->checkbox(['label' => false])->label(Yii::t('web', 'Status')) ?>

        <?php echo $form->field($lesson, 'video')->widget(FileInput::className(), [

        ]) ?>

        <div class="video">
            <video controls style="width: 100%">
                <source src="http://static.study.edu.vn/courses_assets/6/1/video_intro/video_intro.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <?php echo $form->field($lesson, 'home_work')->widget(FileInput::className(), [
            'options' => [
                'multiple' => true
            ]
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(Icon::show('floppy-o') . " " . Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
        </div>

        <?php ActiveForm::end() ?>
    </fieldset>
</div>

<style>
    .form_update {
        margin-bottom: 100px;
    }
</style>

