<?php

/* @var $this yii\web\View */

use frontend\components\widgets\SlideNewsHomeWidget;
use frontend\components\widgets\ListCourseWidget;
use kartik\helpers\Html;

$this->title = 'Study.EDU - Hệ thống học tập trực tuyên';
?>
<div class="container center-align">
    <div class="row" style="margin-bottom: 30px">
        <?php echo SlideNewsHomeWidget::widget([]) ?>
    </div>
</div>

<div class="container center-align">
    <div class="row search_course">
        <p id="title" class="m_color txt_center">Tìm kiếm khóa học</p>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="choose-class">Chọn lớp:</label>
                <?php echo Html::dropDownList('class', '', [1 => 'Lớp 1', 2 => 'Lớp 2', 3 => 'Lớp 3'], [
                    'class' => 'form-control',
                    'prompt' => '-- Lớp học --',
                    'id' => 'class',
                ]) ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="choose-subject">Chọn môn học:</label>
                <?php echo Html::dropDownList('subject', '', [1 => 'Toán học', 2 => 'Văn học', 3 => 'Sinh học'], [
                    'class' => 'form-control',
                    'prompt' => '-- Môn học --',
                    'id' => 'subject',
                ]) ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2" style="height: 74px;line-height: 80px;text-align: left;">
            <button type="submit" class="btn btn-default" onclick="search_course()">Tìm kiếm</button>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="row list_course">
    <div class="container center-align">
        <!-- Khóa học miễn phí -->
        <?php echo ListCourseWidget::widget([
            'title' => 'Khóa học miễn phí',
            'type' => 'free'
        ]) ?>
    </div>
</div>
