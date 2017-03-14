<?php

/* @var $this yii\web\View */

use frontend\components\widgets\SlideNewsHomeWidget;
use frontend\components\widgets\NewsFeatureWidget;

$this->title = 'Study.EDU - Học tập trực tuyến';
?>
<div class="row">
    <div class="col-md-9 slide_news">
        <?php echo SlideNewsHomeWidget::widget([]) ?>
    </div>
    <div class="col-md-3 news_feature">
        <?php echo NewsFeatureWidget::widget([]) ?>
    </div>
</div>