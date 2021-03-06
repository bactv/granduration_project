<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 5:51 CH
 */

use yii\helpers\Html;
use kartik\icons\Icon;
use yii\helpers\Url;
use common\components\AssetApp;

Icon::map($this, Icon::FA);

?>
<style>
    ul.dropdown-menu li a {
        padding: 10px 5px;
        width: 100%;
    }
    .header .nav ul li ul.dropdown-menu li {
        padding: 0 7px;
        width: 100%;
    }
    .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
        background: none;
    }
    .badge-notify{
        background: red;
        position: relative;
        top: -10px;
        left: -10px;
        font-size: 10px;
    }
    ul.notification {
        width: 400px;
        height: 500px;
        overflow-y: scroll;
    }
</style>

<script src="/themes/default/js/bootstrap.min.js"></script>

<ul>
    <?php foreach ($menus as $menu) { ?>
        <li><a href="<?php echo Url::toRoute([$menu['url']]) ?>"><?php echo $menu['name'] ?></a></li>
    <?php } ?>
    <?php if (!empty(Yii::$app->user->identity)) { ?>
        <li class="pos_right dropdown pos_right_log">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span id="avatar" style="background: none">
                    <?php
                    $avatar = AssetApp::getImageBaseUrl() . '/avatar_icon_2.png';
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
                    <a href="<?php echo Url::toRoute(['/site/logout']) ?>">
                        <?php echo Icon::show('circle-o-notch ') ?> Đăng xuất
                    </a>
                </li>
            </ul>
        </li>
        <?php echo \frontend\components\widgets\NotificationWidget::widget([]) ?>
    <?php } else { ?>
        <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/site/signup']) ?>">Đăng ký</a></span></li>
        <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/site/login']) ?>">Đăng nhập</a></span></li>
    <?php } ?>
</ul>