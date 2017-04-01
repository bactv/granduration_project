<?php

/* @var $this yii\web\View */

use frontend\components\widgets\SlideNewsHomeWidget;
use frontend\components\widgets\ListCourseWidget;
use kartik\helpers\Html;

$this->title = 'Study.EDU - Hệ thống học tập trực tuyên';
?>
<div class="row" style="margin-bottom: 30px">
    <?php echo SlideNewsHomeWidget::widget([]) ?>
</div>

<div class="row search_course">
    <p id="title" class="m_color txt_center">Tìm kiếm khóa học</p>
    <div class="col-md-2"></div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="choose-class">Chọn lớp:</label>
            <?php echo Html::dropDownList('class', '', [1 => 'Lớp 1', 2 => 'Lớp 2', 3 => 'Lớp 3'], [
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="choose-subject">Chọn môn học:</label>
            <?php echo Html::dropDownList('subject', '', [1 => 'Toán học', 2 => 'Văn học', 3 => 'Sinh học'], [
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-2" style="height: 74px;line-height: 80px;text-align: left;">
        <button type="submit" class="btn btn-default">Tìm kiếm</button>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row list_course">
    <?php echo ListCourseWidget::widget([]) ?>
</div>
