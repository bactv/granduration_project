<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 29/03/2017
 * Time: 10:12 CH
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
                <p id="username" class="m_color txt_center"><?php echo $model['tch_username'] ?></p>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#detail_info" onclick="get_user_detail_info()">Thông tin chi tiết</a></li>
                    <li><a data-toggle="tab" href="#list_course_open" onclick="list_course_open()">Danh sách lớp đã mở</a></li>
                </ul>

                <div class="tab-content">
                    <div id="detail_info" class="tab-pane fade in active">
                        <?php echo $this->render('detail_teacher_info', ['model' => $model]) ?>
                    </div>
                    <div id="list_course_open" class="tab-pane fade">
                    </div>
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

    function list_course_open() {
        $.ajax({
            method: 'GET',
            url: '<?php echo Url::toRoute(['/account/get-course-teacher']) ?>',
            success: function (data) {
                $("#list_course_open").html(data);
            }
        });
    }
</script>

<style>
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
    .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    .tab-pane { padding: 15px 0; }
    .tab-content{padding:20px}

    .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
</style>