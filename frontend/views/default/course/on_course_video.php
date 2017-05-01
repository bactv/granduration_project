<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 22/04/2017
 * Time: 5:53 CH
 */
use kartik\helpers\Html;
use frontend\models\Teacher;
use common\components\AssetApp;
use common\components\Utility;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $course['course_name'] . ' - ' . Teacher::getAttributeValue(['tch_id' => $course['teacher_id']], 'tch_full_name');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row on_course_video">
    <div class="col-md-8 lessons">
        <div class="video_intro">
            <div class="panel panel-info">
                <a href="javascript:void(0)" id="show_panel_video_intro" class="panel-info"><div class="panel-heading"><?php echo Icon::show('list') ?> Giới thiệu khóa học <?php echo Icon::show('angle-double-right ') ?></div></a>
                <div class="panel-body panel_video_intro" style="display: none">
                    <video controls>
                        <source src="http://static.study.edu.vn/courses_assets/6/1/video_intro/video_intro.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="list_lessons">
            <div class="panel panel-info">
                <a href="javascript:void(0)" id="show_panel_list_lessons" class="panel-info"><div class="panel-heading"><?php echo Icon::show('list') ?> Danh sách bài giảng <?php echo Icon::show('angle-double-right ') ?></div></a>
                <div class="panel-body panel_list_lessons" style="display: none">

                    <div class="box_lesson">
                        <a href="javascript:void(0)" id="play_video"><p id="lesson_name">Bài 1: Real Madrid tung bom tiền 300 triệu euro xây “Galacticos 3.0</p></a>
                        <p id="lesson_desc">4 năm một lần, Real lại tái cấu trúc đội hình. Lần này, “dải ngân hà 3.0” của đội bóng Hoàng gia là những thương vụ bom tấn như De Gea, Hazard, Hummels hay Bonucci...</p>
                        <p id="lesson_info">
                            <span id="time_video"><?php echo Icon::show('play-circle') ?> 30 phút</span>
                            <span id="number_view"><?php echo Icon::show('users') ?> 5000 lượt xem</span>
                        </p>
                    </div>

                    <div class="box_lesson">
                        <a href="#"><p id="lesson_name">Bài 1: Real Madrid tung bom tiền 300 triệu euro xây “Galacticos 3.0</p></a>
                        <p id="lesson_desc">4 năm một lần, Real lại tái cấu trúc đội hình. Lần này, “dải ngân hà 3.0” của đội bóng Hoàng gia là những thương vụ bom tấn như De Gea, Hazard, Hummels hay Bonucci...</p>
                        <p id="lesson_info">
                            <span id="time_video"><?php echo Icon::show('play-circle') ?> 30 phút</span>
                            <span id="number_view"><?php echo Icon::show('users') ?> 5000 lượt xem</span>
                        </p>
                    </div>

                    <div class="box_lesson">
                        <a href="#"><p id="lesson_name">Bài 1: Real Madrid tung bom tiền 300 triệu euro xây “Galacticos 3.0</p></a>
                        <p id="lesson_desc">4 năm một lần, Real lại tái cấu trúc đội hình. Lần này, “dải ngân hà 3.0” của đội bóng Hoàng gia là những thương vụ bom tấn như De Gea, Hazard, Hummels hay Bonucci...</p>
                        <p id="lesson_info">
                            <span id="time_video"><?php echo Icon::show('play-circle') ?> 30 phút</span>
                            <span id="number_view"><?php echo Icon::show('users') ?> 5000 lượt xem</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4 box_right">
        <div class="item">
            <p id="title">Tin tức</p>
            <ul class="list_news">
                <li>
                    <div id="news_title"><a href="#">1. Real Madrid tung bom tiền 300 triệu euro xây “Galacticos 3.0”</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">2. Everton - Chelsea: Cú nã đại bác thần thánh</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">3. Tottenham - Arsenal: 146 giây định đoạt derby</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">4. Messi dọa ra đi, chủ tịch Barca "bơm máu" 86 triệu...</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">5. MU bất bại 25 trận: Mourinho bị "chế giễu" sấp...</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>...</li>
                <li style="text-align: center;">
                    <div id="news_title"><a href="#">Xem thêm >></a></div>
                </li>
            </ul>
        </div>

        <div class="item">
            <p id="title">Thống kê online</p>
        </div>

        <div class="item">
            <p id="title">Thảo luận</p>
            <ul class="list_news">
                <li>
                    <div id="news_title"><a href="#">1. Real Madrid tung bom tiền 300 triệu euro xây “Galacticos 3.0”</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">2. Everton - Chelsea: Cú nã đại bác thần thánh</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">3. Tottenham - Arsenal: 146 giây định đoạt derby</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">4. Messi dọa ra đi, chủ tịch Barca "bơm máu" 86 triệu...</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>
                    <div id="news_title"><a href="#">5. MU bất bại 25 trận: Mourinho bị "chế giễu" sấp...</a></div>
                    <div id="news_time">16/04/2016, 09:18 Giang Nguyen Thi Thu</div>
                </li>
                <li>...</li>
                <li style="text-align: center;">
                    <div id="news_title"><a href="#">Xem thêm >></a></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="overlay" style="display: none">
    <div class="box_video_play">
        <div id="close_video"><a href="javascript:void(0)"><?php echo Icon::show('close') ?></a></div>
        <video controls>
            <source src="http://static.study.edu.vn/courses_assets/6/1/video_intro/video_intro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

<style>
    .on_course_video {}
    .on_course_video .box_right {
        padding-left: 10px;
    }
    .on_course_video .box_right .item {
        background: #fff;
        padding-top: 0;
        border-radius: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border: 1px solid #e3e3e3;
        margin-bottom: 30px;
    }
    .on_course_video .box_right .item p#title {
        font-family: "arvoregular, Arial, Helvetica,sans-serif";
        background: #fafafa;
        padding: 13px 0;
        border-bottom: 1px solid #d5d5d5;
        text-align: center;
        color: #c02424;
        font-size: 23px;
    }
    .on_course_video .box_right .item ul.list_news {
        list-style-type: none;
        padding: 0px 10px;
    }
    .on_course_video .box_right .item ul.list_news li {
        margin-bottom: 10px;
    }
    .on_course_video .box_right .item ul.list_news li div#news_title {
        margin-bottom: 5px;
    }
    .on_course_video .box_right .item ul.list_news li div#news_title a {
        font-weight: 600;
        font-size: 13px;
    }
    .on_course_video .box_right .item ul.list_news li div#news_title a:hover {
        text-decoration: underline;
    }
    .on_course_video .box_right .item ul.list_news li div#news_time {
        font-size: 12px;
    }

    .on_course_video .lessons {
        border: 1px solid #e3e3e3;
        padding: 10px;
    }
    .on_course_video .lessons .video_intro {}
    .on_course_video .lessons .video_intro video {
        width: 100%;
    }
    .on_course_video .lessons .list_lessons {}
    .on_course_video .lessons .list_lessons .box_lesson {
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }
    .on_course_video .lessons .list_lessons .box_lesson:last-child {
        border-bottom: 0;
    }
    .on_course_video .lessons .list_lessons .box_lesson #lesson_name {
        font-size: 14px;
        font-weight: bold;
    }
    .on_course_video .lessons .list_lessons .box_lesson #lesson_desc {
        font-size: 13px;
    }
    .on_course_video .lessons .list_lessons .box_lesson #lesson_info {
        color: brown;
        font-size: 12px;
        font-style: italic;
    }
    .on_course_video .lessons .list_lessons .box_lesson #lesson_info #time_video {
        margin-right: 20px;
    }
    .on_course_video .lessons .list_lessons .box_lesson #lesson_info #number_view {}
    .overlay {
        background-color: #444; /*or semitransparent image*/
        display: none;
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
    }
    .box_video_play {
        margin: 0 auto;
        text-align: center;
        padding-top: 5%;
    }
    .box_video_play video {
        background: #FFF;
    }
    #close_video {
        text-align: right;
        padding-right: 18%;
        font-size: 20px;
    }
    #close_video a {
        color: #FFF;
    }
</style>

<script>
    $(document).on('click', 'a#show_panel_video_intro', function () {
        $("div.panel_video_intro").toggle(1000);
    });
    $(document).on('click', 'a#show_panel_list_lessons', function () {
        $("div.panel_list_lessons").toggle(300);
    });
    $(document).on('click', 'a#play_video', function () {
        $(".overlay").show();
    });
    $(document).on('click', '#close_video', function () {
        $(".overlay").hide();
    });
</script>