<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 19/04/2017
 * Time: 11:39 CH
 */
use kartik\helpers\Html;
use yii\helpers\Url;
use frontend\models\Course;
use frontend\models\CourseType;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Subject;
use frontend\models\ClassLevel;
use kartik\icons\Icon;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;

Icon::map($this, Icon::FA);

?>
<p class="txt_center m_color f_s_30">Tạo khóa học mới</p>

<div class="form_create_course">
    <?php $form = ActiveForm::begin([

    ]) ?>
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6">
            <fieldset>
                <legend>Thông tin khóa học</legend>
                <?= $form->field($model, 'course_name')->textInput() ?>

                <?= $form->field($model, 'course_description')->widget(CKEditor::className(), [
                    'editorOptions' => [
                        'preset' => 'basic',
                        'inline' => false,
                        'rows' => 5
                    ],
                ]) ?>

                <?= $form->field($model, 'course_type_id')->dropDownList(ArrayHelper::map(CourseType::find()->all(), 'type_id', 'type_name')) ?>

                <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => 0, 'value' => 0]) ?>

                <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'), []) ?>

                <?= $form->field($model, 'class_level_id')->dropDownList(ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'), []) ?>

                <?= $form->field($model, 'privacy')->dropDownList(['1' => 'Công khai', '2' => 'Riêng tư']) ?>
            </fieldset>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <fieldset>
                <legend>Yêu cầu khác</legend>

                <?= $form->field($model, 'video_intro')->widget(FileInput::className(), [

                ]) ?>

                <?= $form->field($model, 'lecture_note')->widget(FileInput::className(), [

                ]) ?>

            </fieldset>
        </div>
    </div>
    <div class="row form-group" style="text-align: center">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
