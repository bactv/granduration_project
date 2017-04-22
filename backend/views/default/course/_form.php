<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;
use backend\models\Teacher;
use yii\helpers\ArrayHelper;
use backend\models\Party;
use backend\models\CourseType;
use kartik\date\DatePicker;
use backend\models\Subject;
use backend\models\ClassLevel;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

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

    <?= $form->field($model, 'course_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'logo')->widget(FileInput::className(), [
        'options'=>[
            'multiple' => false
        ],
        'pluginOptions' => [

        ]
    ]) ?>

    <?= $form->field($model, 'video_intro')->widget(FileInput::className(), [

    ]) ?>

    <?= $form->field($model, 'lecture_note')->widget(FileInput::className(), [

    ]) ?>

    <?= $form->field($model, 'course_description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            'inline' => false,
            'rows' => 5
        ],
    ]) ?>

    <?= $form->field($model, 'teacher_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Teacher::find()->all(), 'tch_id', 'tch_full_name'),
        'options' => [
            'prompt' => 'Giáo viên',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])?>

    <?= $form->field($model, 'party_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Party::find()->all(), 'party_id', 'party_name'),
        'options' => [
            'prompt' => 'Đối tác'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])?>

    <?= $form->field($model, 'course_type_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(CourseType::find()->all(), 'type_id', 'type_name'),
        'options' => [
            'prompt' => 'Hình thức học...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= $form->field($model, 'price', [
        'addon' => [
            'append' => [
                'content'=>'<b>VNĐ</b>'
            ]
        ]
    ])->textInput(['maxlength' => 11, 'type' => 'number', 'min' => 0, '']) ?>

    <?= $form->field($model, 'signed_to_date')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d/m/Y'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d/m/Y'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d/m/Y'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'subject_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'),
        'options' => [
            'prompt' => 'Môn học...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= $form->field($model, 'class_level_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'),
        'options' => [
            'prompt' => 'Trình độ lớp...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]) ?>

    <?= $form->field($model, 'privacy')->dropDownList([1 => 'Public', 2 => 'Private'], [
        'prompt' => 'Quyền riêng tư ...'
    ]) ?>

    <?= $form->field($model, 'approved')->dropDownList([1 => 'Đã phê duyệt', 0 => 'Đang xem xét', -1 => 'Từ chôi phê duyệt']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
