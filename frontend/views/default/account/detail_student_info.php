<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 29/03/2017
 * Time: 11:16 CH
 */

use kartik\form\ActiveForm;
use kartik\helpers\Html;
use yii\helpers\Url;
?>

<div class="update_info">
    <?php $form = ActiveForm::begin([
        'action' => ''
    ]) ?>

    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <?php
                echo '<label class="control-label">Tên đăng nhập</label>';
                echo $form->field($model, 'std_username')->textInput([
                    'disabled' => 'true',
                    'id' => 'username'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Mật khẩu cũ</label>';
                echo $form->field($model, 'std_password')->passwordInput([
                    'value' => '',
                    'id' => 'password'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Mật khẩu mới</label>';
                echo $form->field($model, 'new_password')->passwordInput([
                    'id' => 'new_password'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Nhập lại mật khẩu mới</label>';
                echo $form->field($model, 're_new_password')->passwordInput([
                    'id' => 're_new_password'
                ])->label(false);
                ?>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="row">
                <?php
                echo '<label class="control-label">Họ và tên</label>';
                echo $form->field($model, 'std_full_name')->textInput([
                    'id' => 'full_name'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Số ĐT</label>';
                echo $form->field($model, 'std_phone')->textInput([
                    'id' => 'phone'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Ngày sinh</label>';
                echo $form->field($model, 'std_birthday')->textInput([
                    'id' => 'birthday',
                    'placeholder' => 'dd/mm/yyyy'
                ])->label(false);
                ?>
            </div>
            <div class="row">
                <?php
                echo '<label class="control-label">Trường</label>';
                echo $form->field($model, 'std_school_name')->textInput([
                    'id' => 'school_name'
                ])->label(false);
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <?php echo Html::a('Cập nhật', 'javascript:void(0)', ['class' => 'btn btn-primary', 'onclick' => 'update_account_student()']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


