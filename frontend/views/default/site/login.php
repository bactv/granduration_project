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
use kartik\social\FacebookPlugin;
use kartik\social\GooglePlugin;
use kartik\social\TwitterPlugin;
use kartik\social\Module;
use yii\helpers\Url;

Icon::map($this, Icon::FA);
?>
<style>
    span.input-group-addon {
        min-width: 40px;
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
    .confirm-stu-or-tch {
        text-align: center;
    }
    #btn-confirm {
        border-radius: 0;
        width: 220px;
        padding: 15px;
        margin-bottom: 20px;
    }
    .create_account p#intro {
        text-align: center;
        font-style: italic;
        margin-bottom: 30px;
    }

</style>
<?php if (empty($type)) { ?>

    <div class="confirm-stu-or-tch">
        <?php echo Html::a('Bạn là giáo viên ? >>', ['/site/login', 'type' => 'teacher'], ['class' => 'btn btn-info', 'id' => 'btn-confirm']) ?>
        <?php echo Html::a('Bạn là học sinh ? >>', ['/site/login', 'type' => 'student'], ['class' => 'btn btn-warning', 'id' => 'btn-confirm']) ?>
    </div>

<?php } else { ?>
    <div class="create_account">
        <p id="header">Đăng nhập</p>
        <p id="intro">(Đăng nhập với tư cách là <?php echo ($type == 'teacher') ? 'giáo viên' : 'học sinh' ?>)</p>

        <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => [
                'deviceSize' => ActiveForm::SIZE_SMALL
            ],
            'id' => 'from_create'
        ]) ?>

        <?php echo $form->field($model, 'username', [
            'addon' => [
                'prepend' => [
                    'content'=>Icon::show('user')
                ],
                'width' => '50px',
            ],
        ])->textInput(['class' => 'form-control', 'placeholder' => Yii::t('web', 'Username'), 'width' => '100%'])->label(false); ?>
        <?php echo $form->field($model, 'password', [
            'addon' => [
                'prepend' => [
                    'content'=>Icon::show('key ')
                ]
            ],
        ])->passwordInput(['class' => 'form-control', 'placeholder' => Yii::t('web', 'Password')])->label(false); ?>

        <?= $form->field($model, 'rememberMe')->checkbox(['label' => Yii::t('web', 'Ghi nhớ đăng nhập ?')], true) ?>

        <div class="form-group" style="text-align: center">
            <?php echo Html::submitButton(Yii::t('web', 'Login') . " <i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>", ['class' => 'btn btn-primary block full-width m-b']) ?>
            <?php echo Html::resetButton(Yii::t('web', 'Reset') . " <i class=\"fa fa-refresh\" aria-hidden=\"true\"></i>", ['class' => 'btn btn-default block full-width m-b']) ?>
        </div>

        <?php ActiveForm::end() ?>
    </div>
<?php } ?>
