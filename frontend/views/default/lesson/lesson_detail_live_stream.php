<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/05/2017
 * Time: 9:12 CH
 */
use kartik\icons\Icon;
use yii\helpers\Url;
use common\components\Utility;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $lesson['lesson_name'];
$this->params['breadcrumbs'] = [
    ['label' => $course['course_name']],
    ['label' => $lesson['lesson_name']]
]
?>
<div class="row lesson_detail">
    <div class="col-md-7">
        <div class="panel panel-info">
            <a href="javascript:void(0)" class="panel-info"><div class="panel-heading"><?php echo Icon::show('list') ?> Nội dung bài học <?php echo Icon::show('angle-double-right ') ?></div></a>
            <div class="panel-body">
                <?php echo $lesson['lesson_desc'] ?>
            </div>
        </div>

        <div class="review_lesson">
            <div class="panel panel-info">
                <a href="javascript:void(0)" id="show_panel_review_lesson" class="panel-info"><div class="panel-heading"><?php echo Icon::show('list') ?> Xem lại bài giảng <?php echo Icon::show('angle-double-right ') ?></div></a>
                <div class="panel-body panel_review_lesson" style="display: none">
                    <video controls>
                        <source src="http://static.study.edu.vn/courses_assets/6/1/video_intro/video_intro.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="lesson_references">
            <div class="panel panel-info">
                <a href="javascript:void(0)" id="show_panel_lesson_references" class="panel-info"><div class="panel-heading"><?php echo Icon::show('list') ?> Tài liệu bài giảng, bài tập <?php echo Icon::show('angle-double-right ') ?></div></a>
                <div class="panel-body panel_lesson_references" style="display: none">
                    <ul>
                        <li><a href="#" target="_blank">1. Tai_lieu_1.pdf</a></li>
                        <li><a href="#" target="_blank">2. Tai_lieu_2.pdf</a></li>
                        <li><a href="#" target="_blank">3. Tai_lieu_3.pdf</a></li>
                        <li><a href="#" target="_blank">4. Tai_lieu_4.pdf</a></li>
                        <li><a href="#" target="_blank">5. Tai_lieu_5.pdf</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-danger"><?php echo Icon::show('video-camera') ?>Live Stream</button>
    </div>

    <div class="col-md-5 box_right">
        <div class="item">
            <p id="title">Các bài học khác</p>
            <ul class="list_news">
                <?php foreach ($arr_lessons as $k => $ls) {
                    if ($ls['id'] != $lesson['id']) { ?>
                    <li>
                        <div id="news_title"><a href="<?php echo Url::toRoute(['/lesson/lesson-detail', 'course_id' => Utility::encrypt_decrypt('encrypt', $ls['course_id']), 'lesson_id' => Utility::encrypt_decrypt('encrypt', $ls['id'])]) ?>">Bài: <?php echo ($k + 1) ?>: <?php echo $ls['lesson_name'] ?></a></div>
                    </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>

<style>
    .lesson_detail {}
    .lesson_detail .box_right {
        padding-left: 10px;
    }
    .lesson_detail .box_right .item {
        background: #fff;
        padding-top: 0;
        border-radius: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border: 1px solid #e3e3e3;
        margin-bottom: 30px;
    }
    .lesson_detail .box_right .item p#title {
        font-family: "arvoregular, Arial, Helvetica,sans-serif";
        background: #fafafa;
        padding: 13px 0;
        border-bottom: 1px solid #d5d5d5;
        text-align: center;
        color: #c02424;
        font-size: 23px;
    }
    .lesson_detail .box_right .item ul.list_news {
        list-style-type: none;
        padding: 0px 10px;
    }
    .lesson_detail .box_right .item ul.list_news li {
        margin-bottom: 10px;
    }
    .lesson_detail .box_right .item ul.list_news li div#news_title {
        margin-bottom: 5px;
    }
    .lesson_detail .box_right .item ul.list_news li div#news_title a {
        font-weight: 600;
        font-size: 13px;
    }
    .lesson_detail .box_right .item ul.list_news li div#news_title a:hover {
        text-decoration: underline;
    }
    .lesson_detail .box_right .item ul.list_news li div#news_time {
        font-size: 12px;
    }

    .lesson_detail .review_lesson {}
    .lesson_detail .review_lesson video {
        width: 100%;
    }

    .lesson_detail .lesson_references {}
    .lesson_detail .lesson_references ul {
        list-style-type: none;
    }
    .lesson_detail .lesson_references ul li{
        padding: 5px;
    }
</style>

<script>
    $(document).on('click', 'a#show_panel_review_lesson', function () {
        $("div.panel_review_lesson").toggle(1000);
    });
    $(document).on('click', 'a#show_panel_lesson_references', function () {
        $("div.panel_lesson_references").toggle(300);
    });
    $(document).on('click', 'a#play_video', function () {
        $(".overlay").show();
    });
    $(document).on('click', '#close_video', function () {
        $(".overlay").hide();
    });
</script>