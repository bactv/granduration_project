<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:59 CH
 */
use frontend\components\widgets\ListCourseWidget;
use common\components\AssetApp;
use kartik\icons\Icon;
use frontend\models\Teacher;
use common\components\Utility;
use frontend\models\StudentCourse;
use yii\helpers\Url;

$this->title = $this->params['title'] = 'Luyện thi ĐH, CĐ';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this, Icon::FA);
?>

<style>
    .course_detail {

    }
    .course_detail p#course_name {
        font-size: 20px;
        color: blueviolet;
    }
    .course_detail p#tch_name {

    }
    .course_detail .video-intro {
        position: relative;
        height: 420px;
        margin-bottom: 20px;
    }
    .course_detail .video-intro video {
        position: absolute;
        width: 100%;
        height: 420px;
    }
    .course_detail .course_description {
        margin-bottom: 10px;
        text-align: justify;
    }
    .course_detail .course_description p#title {

    }
    .course_detail .course_lecture {
        margin-bottom: 10px;
    }
    .course_detail .join_course {
        padding-left: 30px;
    }
    .course_detail .join_course .num_std {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .num_std i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    .course_detail .join_course .signed_date {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .signed_date i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    .course_detail .join_course .course_fee {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .course_fee i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    span#spe {
        font-style: italic;
        color: #b57338;
    }
    .btn-join a {
        width: 100%;
        padding: 10px;
        font-size: 17px;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>

<?php
    $course_name = $course['course_name'];
    $teacher_name = Teacher::getAttributeValue(['tch_id' => $course['teacher_id']], 'tch_full_name');
    $course_des = $course['course_description'];
    $video = Utility::get_content_static(Yii::$app->params['img_url']['courses_assets']['folder'] .
        '/' . $course['teacher_id'] . '/' . $course['course_id'] . '/video_intro/', 'video_intro');
    $signed_to_date = Utility::formatDataTime($course['signed_to_date'], '-', '/');
    $number_signed = number_format(count(StudentCourse::findAll(['course_id' => $course['course_id']]))) . ' đăng ký';
    $fee = number_format($course['price']) . ' VNĐ';
?>

<div class="row course_detail">
    <div class="row">
        <p id="course_name"><?php echo $course_name ?></p>
        <p id="tch_name">Giáo viên: <a href="#"><?php echo $teacher_name ?></a></p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="video-intro">
                <video controls>
                    <source src="<?php echo $video ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="course_description">
                <p id="title"><b>Mô tả khóa học</b></p>
                <div class="detail"><?php echo $course_des ?></div>
            </div>
            <div class="course_lecture">
                <p id="title"><b>Đề cương khóa học</b></p>
            </div>
            <div class="course_teacher">
                <p id="title"><b>Giáo viên</b></p>
            </div>
        </div>
        <div class="col-md-4 left">
            <div class="join_course">
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Hạn đăng ký: <span id="spe"><?php echo $signed_to_date ?></span></div>
                <div class="num_std"><?php echo Icon::show('users') ?> Đã đăng ký: <span id="spe"><?php echo $number_signed ?></span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe"><?php echo $fee; ?></span></div>
                <div class="btn-join">
                    <?php
                    $check_join_class = false;
                    $user = Yii::$app->user->identity;
                    if (!empty($user)) {
                        // check teacher
                        if ($user->teacher_id == $course['teacher_id']) {
                            $check_join_class = true;
                        }
                        // check student
                        if (!empty(StudentCourse::findOne(['student_id' => $user->student_id, 'course_id' => $course['course_id']]))) {
                            $check_join_class = true;
                        }
                    }
                    ?>
                    <?php if ($check_join_class) { ?>
                        <p><a href="javascript:void(0)" class="btn btn-warning" onclick="click_on_course()">Vào lớp</a></p>
                    <?php } else { ?>
                        <p><a href="javascript:void(0)" class="btn btn-warning" onclick="signed_course()">Đăng ký</a></p>
                        <p><a href="javascript:void(0)" class="btn btn-info" onclick="check_lesson_free()">Học thử 2 buổi miễn phí</a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row course_relation">
    <?php /*echo ListCourseWidget::widget()*/ ?>
</div>

<script src="/themes/default/js/jquery.min.js"></script>
<?php AssetApp::regJsFile('jquery.sticky-kit.min.js', true) ?>
<?php AssetApp::regJsFile('bootstrap.min.js', true) ?>
<?php AssetApp::regCssFilePlugin('dist/css/bootstrap-dialog.css', 'bootstrap3-dialog-master') ?>
<?php AssetApp::regJsFilePlugin('dist/js/bootstrap-dialog.js', 'bootstrap3-dialog-master', true) ?>

<script>
    $(document).ready(function () {
        $(".left").stick_in_parent();
    });
    function check_lesson_free() {
        var course_id = '<?php echo $course['course_id'] ?>';

        $.ajax({
            method: 'GET',
            data: {'course_id' : course_id},
            url: '<?php echo Url::toRoute(['/course/check-free-lesson']) ?>',
            success: function (data) {
                var res = JSON.parse(data);
                if (res.status == 0) {
                    BootstrapDialog.show({
                        title: 'Có lỗi xảy ra!',
                        message: res.message
                    });
                }
            }
        });
    }
    function click_on_course() {
        window.location = '<?php echo Url::toRoute(['/course/on-course', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>'
    }

    function signed_course() {
        var course_id = '<?php echo $course['course_id'] ?>';
        var _csrf = $("meta[name='csrf-param']").attr('content');

        BootstrapDialog.show({
            title: 'Đăng ký khóa học',
            message: 'Bạn có muốn đăng ký khóa học này hay không?',
            buttons: [{
                label: 'Đăng ký',
                action: function(dialog) {
                    $.ajax({
                        method: 'POST',
                        data: {'course_id' : course_id, '_csrf' : _csrf},
                        url: '<?php echo Url::toRoute(['/course/signed-to-course']) ?>',
                        success: function (data) {
                            var res = JSON.parse(data);
                            BootstrapDialog.show({
                                title: 'Info',
                                message: res.message
                            });
                        }
                    });
                    dialog.close();
                }
            }, {
                label: 'Hủy',
                action: function(dialog) {
                    dialog.close();
                }
            }]
        });
    }
</script>
