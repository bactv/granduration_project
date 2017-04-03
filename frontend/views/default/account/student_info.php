<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 11:36 CH
 */
use common\components\AssetApp;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

?>
<div class="user_info">
    <p class="txt_center m_color f_s_30">Thông tin cá nhân</p>
    <div class="row">
        <div class="col-md-3">
            <div class="avatar">
                <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar_icon.png' ?>">
                <a href="javascript:void(0)">
                    <div class="change_avatar c_white">
                        <?php echo Icon::show('camera') ?> <div id="text">Đổi ảnh đại diện</div>
                    </div>
                </a>
            </div>
            <div class="info">
                <p id="username" class="m_color txt_center"><?php echo $model['std_username'] ?></p>
                <p id="balance" class="txt_center">Số dư TK: <span id="if" class="red_color"><?php echo $model['std_balance'] ?></span></p>
                <p id="charging"><a href="<?php echo Url::toRoute(['/account/charging']) ?>" class="btn btn-warning">Nạp tiền</a></p>
            </div>
        </div>

        <div class="col-md-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#detail_info" onclick="get_user_detail_info()">Thông tin chi tiết</a></li>
                <li><a data-toggle="tab" href="#list_course">Các khóa học tham gia</a></li>
                <li><a data-toggle="tab" href="#history_transaction" onclick="get_history_transaction_info()">Lịch sử giao dịch</a></li>
                <li><a data-toggle="tab" href="#user_package" onclick="get_user_package()">Đăng ký gói cước</a></li>
            </ul>

            <div class="tab-content">
                <div id="detail_info" class="tab-pane fade in active">
                    <?php echo $this->render('detail_student_info', ['model' => $model]) ?>
                </div>
                <div id="list_course" class="tab-pane fade">
                </div>
                <div id="history_transaction" class="tab-pane fade">
                </div>
                <div id="user_package" class="tab-pane fade">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function get_user_detail_info() {
        $.ajax({
            method: 'GET',
            url: '<?php echo Url::toRoute(['/account/detail-info']) ?>',
            success: function (data) {
                $("#detail_info").html(data);
            }
        });
    }
    function get_history_transaction_info() {
        $.ajax({
            method: 'GET',
            url: '<?php echo Url::toRoute(['/account/history-transaction-info']) ?>',
            success: function (data) {
                $("#history_transaction").html(data);
            }
        });
    }
    function get_user_package() {
        $.ajax({
            method: 'GET',
            url: '<?php echo Url::toRoute(['/account/user-package']) ?>',
            success: function (data) {
                $("#user_package").html(data);
            }
        });
    }
</script>
