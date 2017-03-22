<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\QuizTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quiz-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'quiz_type_id') ?>

    <?= $form->field($model, 'quiz_type_name') ?>

    <?= $form->field($model, 'quiz_type_description') ?>

    <?= $form->field($model, 'number_quiz') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
