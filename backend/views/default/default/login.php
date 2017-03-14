<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 12:52 SA
 */

use yii\helpers\Html;
use yii\captcha\Captcha;
use kartik\form\ActiveForm;
$this->title = Yii::$app->name . ' - ' . Yii::t('cms', 'Login');
?>
<div id="form-login">
    <h3 class="text-center form-title"><?php echo Yii::t('cms', 'Login CMS'); ?></h3>
    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'm-t',
            'role' => 'form'
        ]
    ]); ?>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <?php echo $form->field($model, 'username', [
            'addon' => ['prepend' => ['content' => "<i class=\"fa fa-user\" aria-hidden=\"true\"></i>"]]
        ])->textInput(['class' => 'form-control', 'placeholder' => Yii::t('cms', 'Username'), 'required' => ''])->label(false); ?>
    </div>
    <div class="form-group">
        <?php echo $form->field($model, 'password', [
            'addon' => ['prepend' => ['content' => "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>"]]
        ])->passwordInput(['class' => 'form-control', 'placeholder' => Yii::t('cms', 'Password'), 'required' => ''])->label(false); ?>
    </div>
    <div class="form-group">
        <?php echo $form->field($model, 'verifyCode')->widget(Captcha::className(), ['captchaAction' => 'default/captcha', 'imageOptions' => ['width' => '99', 'height' => '32'], 'template' => '<div class="row"><div class="col-lg-6">{input}</div><div class="col-lg-4">{image}</div><a href="javascript:;" id="capcha-refresh-button"><i class="fa fa-refresh f-s-18"></i></a></div>', 'options' => ['placeholder' => Yii::t('cms', 'Verify Code'), 'class' => 'form-control']])->label(false); ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'rememberMe')->checkbox(['label' => Yii::t('cms', 'Remember me')], true) ?>
        <?php echo Html::submitButton(Yii::t('cms', 'Login') . " <i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>", ['class' => 'btn btn-primary block full-width m-b']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <br/>
    <p class="m-t text-center"><small>&copy; Copyright by bactv <?php echo date("Y") ?></small></p>
</div>