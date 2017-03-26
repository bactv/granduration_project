<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:43 SA
 */
use kartik\form\ActiveForm;
use kartik\icons\Icon;
use kartik\helpers\Html;

Icon::map($this, Icon::FA);
?>
<style>
    span.input-group-addon {
        /*width: 40px;*/
    }
    .create_account {

    }
    .create_account p#header {
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        color: #0ead8e;
    }
    .create_account {

    }
    .create_account {

     }
    .form-group {
        margin: 0 !important;
    }
    .form-group .col-sm-10 {
        width: 100%;
    }
    #from_create {
        padding: 0px 300px;
    }

</style>
<div class="create_account">
    <p id="header">Đăng ký tài khoản</p>

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'deviceSize' => ActiveForm::SIZE_SMALL
        ],
        'id' => 'from_create'
    ]) ?>

    <?php echo $form->field($model, 'std_username', [
        'addon' => [
            'prepend' => [
                'content'=>Icon::show('user')
            ],
            'width' => '50px',
        ],
    ])->textInput(['class' => 'form-control', 'placeholder' => Yii::t('cms', 'Tên đăng nhập'), 'width' => '100%'])->label(false); ?>
    <?php echo $form->field($model, 'std_password', [
        'addon' => [
            'prepend' => [
                'content'=>Icon::show('key ')
            ]
        ],
    ])->passwordInput(['class' => 'form-control', 'placeholder' => Yii::t('cms', 'Mật khẩu')])->label(false); ?>

    <?php echo $form->field($model, 'std_full_name', [
        'addon' => [
            'prepend' => [
                'content'=>Icon::show('info')
            ]
        ],
    ])->textInput(['class' => 'form-control', 'placeholder' => Yii::t('cms', 'Họ và tên')])->label(false); ?>

    <div class="form-group" style="text-align: center">
        <?php echo Html::submitButton(Yii::t('cms', 'Register') . " <i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>", ['class' => 'btn btn-primary block full-width m-b']) ?>
        <?php echo Html::resetButton(Yii::t('cms', 'Reset') . " <i class=\"fa fa-refresh\" aria-hidden=\"true\"></i>", ['class' => 'btn btn-default block full-width m-b']) ?>
    </div>

    <?php ActiveForm::end() ?>
</div>

<div class="create_account_social">

</div>
