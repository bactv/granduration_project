<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/04/2017
 * Time: 9:17 SA
 */
use kartik\helpers\Html;
use frontend\models\Teacher;
use common\components\Utility;

$this->title = $this->params['title'] = $course['course_name'] . ' - ' . Teacher::getAttributeValue(['tch_id' => $course['teacher_id']], 'tch_full_name');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="list_lesson">
    <p><a href="javascript:void(0);" onclick="show_video_intro()">Giới thiệu khóa học</a></p>
    <div class="course_intro" style="display: none">
        <?php
        $video = Utility::get_content_static(Yii::$app->params['img_url']['courses_assets']['folder'] .
            '/' . $course['teacher_id'] . '/' . $course['course_id'] . '/video_intro/', 'video_intro');
        ?>
        <video controls>
            <source src="<?php echo $video ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="lists">

    </div>
</div>

<script>
    function show_video_intro() {
        $(".course_intro").toggle(300);
    }
</script>
