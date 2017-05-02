<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use common\components\Utility;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\CourseNews */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Course News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-news-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), Url::toRoute(['/cms-course-manager/news-update', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $model->id]), ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), Url::toRoute(['/cms-course-manager/news-delete', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $model->id]), [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('cms', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'content:ntext',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['status'] == 1) ? 'Active' : 'Inactive';
                }
            ],
            [
                'attribute' => 'created_time',
                'value' => Utility::formatDataTime($model['created_time'], '-', '/', true)
            ],
            [
                'attribute' => 'created_time',
                'value' => Utility::formatDataTime($model['updated_time'], '-', '/', true)
            ],
        ],
    ]) ?>

</div>

<style>
    .table > tbody > tr > th {
        width: 20%;
    }
</style>
