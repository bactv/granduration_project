<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use yii\helpers\Url;
use common\components\Utility;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\CourseNews */

$this->title = Yii::t('cms', 'Update {modelClass}: ', [
    'modelClass' => 'Course News',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $course['course_name']];
$this->params['breadcrumbs'][] = ['label' => 'Tin tức, thông báo', 'url' => Url::toRoute(['cms-course-manager/news', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])])];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="course-news-update">
    <?= $this->render('_form', [
        'model' => $model,
        'course' => $course
    ]) ?>

</div>
