<?php

/* @var $this yii\web\View */

use frontend\components\widgets\SlideNewsHomeWidget;
use frontend\components\widgets\ListCourseWidget;

$this->title = 'Study.EDU - Hệ thống học tập trực tuyên';
?>
<div class="rows" style="margin-bottom: 30px">
    <?php echo SlideNewsHomeWidget::widget([]) ?>
</div>

<div class="row list_course">
    <?php echo ListCourseWidget::widget([]) ?>
</div>