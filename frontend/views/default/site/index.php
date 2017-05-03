<?php

/* @var $this yii\web\View */

use frontend\components\widgets\SlideNewsHomeWidget;
use frontend\components\widgets\ListCourseWidget;
use kartik\helpers\Html;
use frontend\models\ClassLevel;
use frontend\models\Subject;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

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
                <label for="choose-class">Chọn môn học:</label>
                <?php echo Html::dropDownList('class', '', ArrayHelper::map(Subject::get_all_subjects(), 'subject_id', 'subject_name'), [
                    'class' => 'form-control',
                    'id' => 'subject_id',
                ]) ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="choose-subject">Chọn lớp:</label>
                <?php echo Html::dropDownList('subject', '', ArrayHelper::map(ClassLevel::get_all_class(), 'class_level_id', 'class_level_name'), [
                    'class' => 'form-control',
                    'id' => 'class_id',
                ]) ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2" style="height: 74px;line-height: 80px;text-align: left;">
            <button type="submit" class="btn btn-success" onclick="search_course()"><?php echo Icon::show('search') ?> Tìm kiếm</button>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="row list_course">
    <div class="container center-align">
        <!-- Tất cả khóa học -->
        <?php echo ListCourseWidget::widget([
            'title' => 'Tất cả khóa học',
            'type' => 'all'
        ]) ?>

        <!-- Khóa học miễn phí -->
        <?php echo ListCourseWidget::widget([
            'title' => 'Khóa học miễn phí',
            'type' => 'free'
        ]) ?>

        <!-- Khóa học miễn phí -->
        <?php echo ListCourseWidget::widget([
            'title' => 'Khóa học hot nhất',
            'type' => 'hot'
        ]) ?>
    </div>
</div>
