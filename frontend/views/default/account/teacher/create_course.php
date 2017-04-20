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
use kartik\date\DatePicker;
use yii\bootstrap\Alert;

Icon::map($this, Icon::FA);

?>
<p class="txt_center m_color f_s_30">Tạo khóa học mới</p>

<?php
if (Yii::$app->session->hasFlash('error')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-danger'],
        'body' => Yii::$app->session->getFlash('error'),
    ]);
}
?>

<div class="form_create_course">
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
        'method' => 'POST',
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

                <?= $form->field($model, 'course_type_id')->dropDownList(ArrayHelper::map(CourseType::find()->all(), 'type_id', 'type_name'), [
                    'id' => 'course_type_id'
                ]) ?>

                <?= $form->field($model, 'price', [
                    'addon' => [
                        'append' => [
                            'content'=>'<b>VNĐ</b>'
                        ]
                    ]
                    ])->textInput(['type' => 'number', 'min' => 0, 'value' => 0, 'prompt' => 'VND']) ?>

                <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'), []) ?>

                <?= $form->field($model, 'class_level_id')->dropDownList(ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'), []) ?>

                <?= $form->field($model, 'privacy')->dropDownList(['1' => 'Công khai', '2' => 'Riêng tư'], [
                    'id' => 'privacy'
                ]) ?>
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
            <br><br>
            <fieldset>
                <legend>Thời gian</legend>
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

                <?= $form->field($model, 'weekday_time')->textInput([
                    'placeholder' => 'ex. 2 - 9:30, 4 - 17:30, 6 - 21:30, CN - 20:30',
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
