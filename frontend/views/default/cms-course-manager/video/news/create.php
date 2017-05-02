<?php

use yii\helpers\Html;
use kartik\icons\Icon;
use common\components\Utility;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\CourseNews */

$this->title = Yii::t('cms', 'Create {modelClass}', [
    'modelClass' => 'Course News',
]);
$this->params['breadcrumbs'][] = ['label' => $course['course_name']];
$this->params['breadcrumbs'][] = ['label' => 'Tin tức, thông báo', 'url' => Url::toRoute(['cms-course-manager/news', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])])];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
?>
<div class="course-news-update">
    <?= $this->render('_form', [
        'model' => $model,
        'course' => $course
    ]) ?>
</div>

