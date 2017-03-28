<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 2:26 CH
 */

use yii\helpers\Html;
use kartik\icons\Icon;
use common\components\AssetApp;
use frontend\components\widgets\NavWidget;
use frontend\models\Menu;

Icon::map($this, Icon::FA);

?>

<div class="row">
    <div class="col-md-2 logo">
        <?php echo Html::img(AssetApp::getImageBaseUrl() . '/logo_backend_3.png', ['alt' => 'Study.EDU']) ?>
    </div>
    <div class="col-md-10 nav">
        <?php echo NavWidget::widget() ?>
    </div>
</div>
