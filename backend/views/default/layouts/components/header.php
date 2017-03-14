<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 12:56 SA
 */

use yii\helpers\Html;
use kartik\icons\Icon;
use common\components\AssetApp;

Icon::map($this, Icon::FA);
?>

<nav class="navbar navbar-default">
    <ul class="nav navbar-nav navbar-right">
        <li class="person_info dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span id="avatar"> <?php echo Html::img(AssetApp::getImageBaseUrl() . '/avatar_icon_backend_2.png', ['alt' => 'admin']) ?></span>
                <span id="username">bactv</span>
                <span id="chevron_icon"><?php echo Icon::show('chevron-right') ?></span>
                <ul class="dropdown-menu">
                    <li><a href="#"><?php echo Icon::show('cogs') ?> Cập nhật thông tin</a></li>
                    <li><a href="#"><?php echo Icon::show('circle-o-notch ') ?> Đăng xuất</a></li>
                </ul>
            </a>
        </li>
    </ul>
</nav>


