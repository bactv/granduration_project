<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:46 CH
 */
use kartik\helpers\Html;
use frontend\components\widgets\ListCourseWidget;
use kartik\icons\Icon;
use frontend\models\Subject;
use frontend\models\ClassLevel;
use yii\helpers\ArrayHelper;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = 'Danh sách khóa học';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container center-align">
    <div class="row search_course">
        <p id="title" class="m_color txt_center">Tìm kiếm khóa học</p>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="choose-class">Chọn lớp:</label>
                <?php echo Html::dropDownList('class', '', ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'), [
                    'class' => 'form-control',
                    'id' => 'class_id',
                ]) ?>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="choose-subject">Chọn môn học:</label>
                <?php echo Html::dropDownList('subject', '', ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'), [
                    'class' => 'form-control',
                    'id' => 'subject_id',
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
<?php echo ListCourseWidget::widget([
    'type' => $type
]) ?>
