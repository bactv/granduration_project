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
use yii\bootstrap\Alert;
use common\components\Utility;

Icon::map($this, Icon::FA);

?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-info'],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
}
?>

<div class="user_info">
    <p class="txt_center m_color f_s_30">Thông tin cá nhân</p>
    <div class="row">
        <div class="col-md-3">
            <div class="avatar">
                <?php
                $avatar = Utility::get_content_static(Yii::$app->params['img_url']['avatar_teacher']['folder'] .
                    '/', $model['tch_id']);
                if (empty($avatar)) {
                    if ($model['tch_gender'] == 0) {
                        $avatar = AssetApp::getImageBaseUrl() . '/avatar/teacher_female_icon.png';
                    } else {
                        $avatar = AssetApp::getImageBaseUrl() . '/avatar/teacher_male_icon.png';
                    }
                }
                ?>
                <img src="<?php echo $avatar ?>">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#change_avatar">
                    <div class="change_avatar c_white">
                        <?php echo Icon::show('camera') ?> <div id="text">Đổi ảnh đại diện</div>
                    </div>
                </a>

            </div>
            <div class="info">
                <p id="username" class="m_color txt_center"><?php echo $model['tch_username'] ?></p>
            </div>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_avatar">Open Modal</button>
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


<!-- Modal -->
<div id="change_avatar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>
    function change_avatar() {

    }
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