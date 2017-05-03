<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use backend_teacher\models\CourseType;
use backend_teacher\models\Subject;
use backend_teacher\models\ClassLevel;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\file\FileInput;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend_teacher\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'course_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'video_intro')->widget(FileInput::className(), [

    ]) ?>

    <?= $form->field($model, 'lecture_note')->widget(FileInput::className(), [

    ]) ?>

    <?= $form->field($model, 'course_description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic',
            'inline' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'teacher_id')->hiddenInput([
        'value' => Yii::$app->user->identity->tch_id
    ])->label(false) ?>

    <?php if ($model['approved'] != 1) {
        echo $form->field($model, 'course_type_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(CourseType::find()->all(), 'type_id', 'type_name'),
            'options' => [
                'prompt' => 'Hình thức học...'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ]);
    } ?>

    <?php if ($model['approved'] != 1) {
        echo $form->field($model, 'price', [
            'addon' => [
                'append' => [
                    'content'=>'<b>VNĐ</b>'
                ]
            ]
        ])->textInput(['maxlength' => 11, 'type' => 'number', 'min' => 0, '']);

        echo $form->field($model, 'signed_to_date')->widget(DatePicker::className(), [
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d/m/Y'),
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
            ]
        ]);

        echo $form->field($model, 'start_date')->widget(DatePicker::className(), [
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d/m/Y'),
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
            ]
        ]);

        echo $form->field($model, 'end_date')->widget(DatePicker::className(), [
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d/m/Y'),
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy'
            ]
        ]);

        echo $form->field($model, 'subject_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'),
            'options' => [
                'prompt' => 'Môn học...'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label('Môn học');

        echo $form->field($model, 'class_level_id')->widget(Select2::className(), [
            'data' => ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'),
            'options' => [
                'prompt' => 'Trình độ lớp...'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label('Trình độ lớp');

        echo $form->field($model, 'privacy')->dropDownList([1 => 'Công khai', 2 => 'Riêng tư'], []);
    } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('app', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
