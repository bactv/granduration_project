<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:46 CH
 */
use kartik\helpers\Html;
use frontend\components\widgets\ListCourseWidget;

$this->title = $this->params['title'] = 'Danh sách khóa học';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo ListCourseWidget::widget() ?>
