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

Icon::map($this, Icon::FA);

?>

<ul>
    <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1 <span class="caret"></span></a>
        <ul class="dropdown-menu child_menu">
            <li><a href="#">Menu 1-1</a></li>
            <li><a href="#">Menu 1-2</a></li>
            <li><a href="#">Menu 1-3</a></li>
        </ul>
    </li>
    <li><a href="#">Menu 2</a></li>
    <li><a href="#">Menu 3</a></li>
    <li><a href="#">Menu 4</a></li>
    <li><a href="#">Menu 5</a></li>
    <?php if (!empty(Yii::$app->user->identity)) { ?>
        <li class="pos_right"><?php echo Yii::$app->user->identity->std_username ?></li>
    <?php } ?>
    <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/account/create-account']) ?>" target="_blank">Đăng ký</a></span></li>
    <li class="pos_right"><span><a href="<?php echo Url::toRoute(['/account/login']) ?>" target="_blank">Đăng nhập</a></span></li>
</ul>


