<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use backend\models\AgreementRight;
use yii\helpers\ArrayHelper;
use backend\models\Party;
use backend\models\AgreementType;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Agreement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agreement-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 2,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]
    ]); ?>

    <?= $form->field($model, 'agreement_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'party_id_a')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Party::findAll(['party_id' => 1]), 'party_id', 'party_name'),
        'options' => [
            'disabled' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'party_id_b')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Party::find()->where('party_id <> 1')->all(), 'party_id', 'party_name'),
        'options' => [
            'placeholder' => 'Đối tác ...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'agreement_signed_date')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d/m/Y'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'agreement_effective_date')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d/m/Y'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'agreement_right_ids')->widget(Select2::className(), [
        'data' => ArrayHelper::map(AgreementRight::find()->all(), 'agreement_right_id', 'agreement_right_name'),
        'options' => [
            'placeholder' => 'Quyền HĐ ...',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label(Yii::t('cms', 'Agreement Rights')) ?>

    <?= $form->field($model, 'agreement_type_id')->widget(Select2::className(), [
        'data' => ArrayHelper::map(AgreementType::find()->all(), 'agreement_type_id', 'agreement_type_name'),
        'options' => [
            'placeholder' => 'Loại HĐ ...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label(Yii::t('cms', 'Agreement Types')) ?>

    <?= $form->field($model, 'mg')->textInput(['placeholder' => 'ex: 300.888']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o') . " " .  Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Icon::show('undo') . " " .  Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
