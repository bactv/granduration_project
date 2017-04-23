<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/04/2017
 * Time: 10:38 CH
 */
use kartik\helpers\Html;
use frontend\components\widgets\ListCourseWidget;

$this->title = $this->params['title'] = 'Tìm kiếm khóa học: ';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo ListCourseWidget::widget([
    'title' => 'Tìm kiếm khóa học: ' . $class_name . ' - ' . $subject_name,
    'list_course' => $courses,
    'pagination' => $pagination
]) ?>