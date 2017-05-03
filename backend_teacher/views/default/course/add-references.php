<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 9:34 SA
 */
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use kartik\helpers\Html;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);
?>

<?php $form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => [
        'labelSpan' => 2,
        'deviceSize' => ActiveForm::SIZE_SMALL
    ],
    'method' => 'POST',
    'action' => Url::toRoute(['/course/add-references', 'course_id' => $course['course_id']]),
    'options' => [
        'enctype' => 'multipart/form-data',
    ],
]) ?>

<?php echo $form->field($course, 'course_id')->hiddenInput()->label(false) ?>

<?php echo $form->field($course, 'references')->widget(FileInput::className(), [
    'options' => [
        'multiple' => true,
    ]
])->label('File') ?>

    <div class="form-group">
        <?= Html::submitButton(Icon::show('floppy-o') . " " .  Yii::t('app', 'Create'), ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>