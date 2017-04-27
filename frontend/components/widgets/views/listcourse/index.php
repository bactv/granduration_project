<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 9:07 SA
 */
use yii\helpers\Html;
use common\components\AssetApp;
use kartik\icons\Icon;
use yii\helpers\Url;
use frontend\models\Teacher;
use yii\widgets\LinkPager;
use frontend\models\StudentCourse;
use common\components\Utility;

Icon::map($this, Icon::FA);

AssetApp::regJsFilePlugin('owl.carousel.js', 'owl-carousel', true);
AssetApp::regCssFilePlugin('owl.carousel.css', 'owl-carousel', true);
AssetApp::regCssFilePlugin('owl.theme.css', 'owl-carousel', true);
AssetApp::regCssFilePlugin('owl.transitions.css', 'owl-carousel', true);

?>


<style>
    .course_type {
        margin-bottom: 20px;
    }
    .course_type > #title {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .course_type > #title i {
        color: #d60808;
    }
    .course_type .item {
        width: 95%;
        background: #fff;
    }
    .course_type .item:hover {
        box-shadow: 0 0 20px #333;
    }
    .course_type .item img#course_logo {
        width: 100%;
        height: 200px;
    }
    .course_type .item .course_info {
        border: 1px solid #ccc;
        padding: 10px;
    }
    .course_type .item .course_info .tch_info {
        height: 70px;
        margin-bottom: 7px;
    }
    .course_type .item .course_info .tch_info .avatar {

    }
    .course_type .item .course_info .tch_info .avatar img {
        width: 70px;
        border-radius: 50%;
        float: left;
        margin-right: 10px;
    }
    .course_type .item .course_info .tch_info .tch_name {
        line-height: 70px;
        font-weight: bold;
    }
    .course_type .item .course_info .course_name {
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 10px;
        color: #0ead8e;
    }
    .course_type .item .course_info .course_des {
        margin-bottom: 10px;
    }
    .course_type .item .course_info .num_std {
        margin-bottom: 7px;
    }
    .course_type .item .course_info .signed_date {
        margin-bottom: 7px;
    }
    .course_type .item .course_info .course_fee {
        margin-bottom: 7px;
    }
    .course_type .item .course_info span#spe {
        font-style: italic;
    }
    .course_type .item .course_info .view_more {
        text-align: right;
        font-style: italic;
        font-size: 12px;
        color: orange;
    }
    .course_type > .view_more {
        text-align: right;
        font-style: italic;
    }
</style>

<?php if (isset($list_course) && count($list_course) > 0) { ?>
<div class="row course_type">
    <p id="title" class="m_color txt_left"><?php echo ($title != '') ? Icon::show('bookmark') . ' ' . $title : '' ?> </p>
    <div id="owl-course-<?php echo $type ?>" class="owl-carousel owl-theme">
        <?php foreach ($list_course as $course) {
            $course_name = $course['course_name'];
            $signed_to_date = Utility::formatDataTime($course['signed_to_date'], '-', '/');
            $fee = number_format($course['price']) . ' VNĐ';
            $number_signed = number_format(count(StudentCourse::findAll(['course_id' => $course['course_id']]))) . ' đăng ký';
            $url = Url::toRoute(['/course/detail', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]);
            $teacher_name = Teacher::getAttributeValue(['tch_id' => $course['teacher_id']], 'tch_full_name');
            ?>
            <div class="item">
                <a href="<?php echo $url ?>"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
                <div class="course_info">
                    <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">
                        <div class="tch_info">
                            <div class="avatar">
                                <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                            </div>
                            <div class="tch_name"><?php echo $teacher_name ?></div>
                        </div>
                    </a>
                    <div class="course_name"><a href="<?php echo Url::toRoute(['/course/course-detail']) ?>"><?php echo $course_name ?></a></div>
                    <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe"><?php echo $number_signed ?></span></div>
                    <div class="signed_date"><?php echo Icon::show('calendar') ?> Hạn đăng ký: <span id="spe"><?php echo $signed_to_date ?></span></div>
                    <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe"><?php echo $fee ?></span></div>
                    <div class="view_more"><a href="<?php echo $url ?>">Xem thêm >> </a></div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($type != '') { ?>
        <div class="view_more"><a href="<?php echo Url::toRoute(['/course/list-course', 'type' => $type]) ?>">Xem thêm >> </a></div>
    <?php } ?>
</div>
<?php } ?>

<?php
    if (isset($pagination)) {
        echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
    }
?>

<script src="/themes/default/js/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#owl-course-").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3]

        });

        $("#owl-course-hot").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3]

        });

        $("#owl-course-free").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3]

        });
    });
</script>
