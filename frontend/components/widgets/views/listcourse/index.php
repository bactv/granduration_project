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

Icon::map($this, Icon::FA);

?>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

<style>
    .list_c .item {
        width: 280px !important;
        margin: 0 6px;
    }

    .list_c .item .logo {

    }

    .list_c .item .logo img {
        width: 280px;
        height: 180px;
    }
    .list_c .item .course_info {
        padding: 10px;
        border: 1px solid #ccc;
    }
    .list_c .item .course_info .teacher_info {
        margin-bottom: 10px;
    }
    .list_c .item .course_info .teacher_info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        float: left;
    }
    .list_c .item .course_info .teacher_info span.tch_name {
        height: 50px;
        line-height: 50px;
        margin-left: 10px;
        font-weight: bold;
    }
    .list_c .item .course_info .course_name {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 7px;
    }
    .list_c .item .course_info .course_description {
        margin-bottom: 7px;
        text-align: justify;
    }
    .list_c .item .course_info .course_student {
        margin-bottom: 7px;
        font-weight: bold;
        font-size: 13px;
    }
    .list_c .item .course_info .course_fee {
        font-weight: bold;
    }
    .list_c .item .course_info .course_fee #fee{
        color: #2F33AB;
    }

    p#header {
        text-align: center;
        color: #0ead8e;
        font-size: 25px;
        text-transform: uppercase;
    }
    .slick-arrow {

    }
    .slick-next {
        width: 50px;
        height: 50px;
        background-color: #0ead8e;
        z-index: 1;
    }
    .slick-prev {
        width: 50px;
        height: 50px;
        background-color: #0ead8e;
        z-index: 1;
    }
    .slick-next:hover {
        background-color: #0ead8e;
    }
    .slick-prev:hover {
        background-color: #0ead8e;
    }
    .course_mg_bt {
        margin-bottom: 40px;
    }

</style>

<div class="row course_free course_mg_bt">
    <p id="header">Khóa học miễn phí</p>
    <div class="list_c" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row course_hot course_mg_bt">
    <p id="header">Khóa học HOT nhất</p>
    <div class="list_c" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row course_college_exam_pre course_mg_bt">
    <p id="header">Luyện thi ĐH, CĐ</p>
    <div class="list_c" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row course_high_school_exam_pre course_mg_bt">
    <p id="header">Luyện thi THPT</p>
    <div class="list_c" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>

        <div class="item" id="c_1">
            <div class="logo">
                <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/005.jpg' ?>"/></a>
            </div>
            <div class="course_info">
                <div class="teacher_info">
                    <a href="#"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>"/> <span class="tch_name">Trần Văn A</span></a>
                </div>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="course_description">UNSW in proud partnership with the CBA are releasing a sequence of public courses in cyber security, under... </div>
                <div class="course_student">
                    <?php echo Icon::show('users') . " 2221 học sinh" ?>
                </div>
                <div class="course_fee">
                    <span id="lb">Học phí: </span><span id="fee"><i> 1234 xu</i></span>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row course_high_school">

</div>

<div class="row course_junior_high_school">

</div>

<div class="row course_primary_school">

</div>

<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>
    $(document).ready(function () {
        $(".list_c").slick({

            // normal options...
            infinite: false,

            // the magic
            responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: true
                }

            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    dots: true
                }

            }, {

                breakpoint: 300,
                settings: "unslick" // destroys slick

            }]
        });
    });
</script>