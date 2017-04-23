<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 22/04/2017
 * Time: 5:53 CH
 */
use kartik\helpers\Html;
use frontend\models\Teacher;

$this->title = $this->params['title'] = $course['course_name'] . ' - ' . Teacher::getAttributeValue(['tch_id' => $course['teacher_id']], 'tch_full_name');
$this->params['breadcrumbs'][] = $this->title;

?>


