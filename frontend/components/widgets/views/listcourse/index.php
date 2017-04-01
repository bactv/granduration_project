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

AssetApp::regJsFilePlugin('owl.carousel.js', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.carousel.css', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.theme.css', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.transitions.css', 'owl-carousel');

?>


<style>
    .course_type {

    }
    .course_type #title {
        font-size: 30px;
        margin-bottom: 20px;
    }
    .course_type .item {
        width: 97%
    }
    .course_type .item:hover {
        box-shadow: 0 0 10px #ccc;
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
</style>

<div class="row course_type">
    <p id="title" class="m_color txt_center">Khóa học miễn phí</p>
    <div id="owl-course" class="owl-carousel owl-theme">
        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>

        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>

        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>

        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>

        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>

        <div class="item">
            <a href="#"><img id="course_logo" src="<?php echo AssetApp::getImageBaseUrl() . '/slide_3/019.jpg' ?>"></a>
            <div class="course_info">
                <a href="#">
                    <div class="tch_info">
                        <div class="avatar">
                            <img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/tech_1.jpg' ?>">
                        </div>
                        <div class="tch_name">
                            Richard Buckland
                        </div>
                    </div>
                </a>
                <div class="course_name"><a href="#">Apply Lean Six Sigma fundamental skills & knowledge</a></div>
                <div class="num_std"><?php echo Icon::show('users') ?> <span id="spe">3000 đăng ký</span></div>
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="view_more"><a href="#">Xem thêm >> </a></div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#owl-course").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3]

        });
    });
</script>
