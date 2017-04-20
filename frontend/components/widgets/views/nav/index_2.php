<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 9:42 SA
 */

use kartik\icons\Icon;
use yii\helpers\Url;
use common\components\AssetApp;
use yii\helpers\Html;

Icon::map($this, Icon::FA);
?>
<style>
    .nav2 {
        position: relative;
    }
    .nav2 .icon-menu {
        font-size: 25px;
        height: 70px;
        line-height: 70px;
    }
    .nav2 .icon-menu a {
        color: #777;
    }
    .nav2 ul.menu_left {
        background: #fff;
        padding: 10px;
        list-style-type: none;
        display: none;
        position: absolute;
        z-index: 1;
        width: 90%;
    }
    .nav2 ul.menu_left li {
        padding: 7px 0;
    }
    .nav2 ul.menu_left li a{
        color: #333;
    }
    .nav2 ul.menu_left li a:hover {
        color: #00ad9c;
    }
    .overlay-bg {
        opacity: 0.5;
        background: #000;
    }

    .nav2 ul.user_right {
        list-style-type: none;
        display: inline;
        position: absolute;
        width: 100%;
        height: 70px;
        line-height: 70px;
    }
    .nav2 ul.user_right li {
        display: inline;
        float: right;
    }


    .nav2 ul.user_right li ul.dropdown-menu li a {
        padding: 10px 5px;
        width: 100%;
    }
    .nav2 ul.user_right li ul.dropdown-menu li {
        padding: 0 7px;
        width: 100%;
    }
    .nav2 ul.user_right li .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
        background: none;
    }
</style>
<div class="row">
    <div class="col-xs-6">
        <div class="icon-menu"><a href="javascript:void(0)" onclick="toggle_nav()"><?php echo Icon::show('bars') ?></a></div>
        <ul class="menu_left">
            <?php foreach ($menus as $menu) { ?>
                <li><a href="<?php echo Url::toRoute([$menu['url']]) ?>"><?php echo $menu['name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-xs-6">
        <ul class="user_right">
            <?php if (!empty(Yii::$app->user->identity)) { ?>
                <li class="pos_right dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span id="avatar" style="background: none">
                            <?php
                            $avatar = AssetApp::getImageBaseUrl() . '/avatar_icon.png';
                            ?>
                            <?php echo Html::img($avatar, ['alt' => 'admin', 'width' => '50px', 'height' => '50px', 'style' => 'border-radius: 50%;']) ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="<?php echo Url::toRoute(['/account/info']) ?>">
                                <?php echo Icon::show('info-circle') ?> Xem chi tiết
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::toRoute(['/default/logout']) ?>">
                                <?php echo Icon::show('circle-o-notch ') ?> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div onclick="notification_event()" id="notification">
                            <span class="glyphicon glyphicon-comment" style="color: #0ead8e;font-size: 20px"></span>
                            <span class="badge badge-notify">3</span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-right notification">
                            <li><a href="">1. ABC CBD DFG HHD JDD DSD  DSJ DJS DJS DJSH DJSH DJSHJ DSJ DHSJ HDJSH JD  D </a></li>
                            <li><a href="">2. SAD LASKDJKSAJDKLSA JKDJSA LDJKSA JDKSAJ KDLJSAK LDJKSA JKDSAJDKA SDAS S DASDASDSADS </a></li>
                        </ul>
                    </a>
                </li>
            <?php } else { ?>
                <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/site/signup']) ?>" target="_blank">Đăng ký</a></span></li>
                <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/site/login']) ?>" target="_blank">Đăng nhập</a></span></li>
            <?php } ?>
        </ul>
    </div>
</div>
<script>
    function toggle_nav() {
        $(".nav2 ul").fadeToggle(300);
        $(".main_content").toggleClass('overlay-bg')
    }
</script>

