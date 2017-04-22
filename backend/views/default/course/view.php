<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use backend\models\Teacher;
use backend\models\CourseType;
use backend\models\Subject;
use backend\models\ClassLevel;
use backend\models\Party;
use common\components\Utility;
use backend\models\Admin;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Course */

$this->title = $model->course_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->course_id], [
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
            'course_id',
            'course_name',
            [
                'label' => Yii::t('cms', 'Video Intro'),
                'format' => 'raw',
                'value' => function ($model) {
                    $file = Utility::get_content_static(Yii::$app->params['img_url']['courses_assets']['folder'] .
                        '/' . $model['teacher_id'] . '/' . $model['course_id'] . '/video_intro/', 'video_intro');
                    if ($file != '') {
                        return "<video controls style='height: 350px;'><source src='" . $file . "'>" . "Your browser does not support the video tag." .
                                "</video>";
                    } else {
                        return 'Không có';
                    }
                },
            ],
            [
                'label' => Yii::t('cms', 'Lecture Note'),
                'format' => 'raw',
                'value' => function ($model) {
                    $file = Utility::get_content_static(Yii::$app->params['img_url']['courses_assets']['folder'] .
                        '/' . $model['teacher_id'] . '/' . $model['course_id'] . '/lecture_note/', 'lecture_note');
                    if ($file != '') {
                        return Html::a($file, "$file", ['target' => '_blank']);
                    } else {
                        return 'Không có';
                    }
                }
            ],
            [
                'attribute' => 'course_description',
                'format' => 'html'
            ],
            [
                'attribute' => 'teacher_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Teacher::getAttributeValue(['tch_id' => $model['teacher_id']], 'tch_full_name');
                }
            ],
            [
                'attribute' => 'party_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Party::getAttributeValue(['party_id' => $model['party_id']], 'party_name');
                }
            ],
            [
                'attribute' => 'course_type_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return CourseType::getAttributeValue(['type_id' => $model['course_type_id']], 'type_name');
                }
            ],
            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' => function ($model) {
                    return number_format($model['price']) . ' VNĐ';
                }
            ],
            [
                'attribute' => 'subject_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Subject::getAttributeValue(['subject_id' => $model['subject_id']], 'subject_name');
                }
            ],
            [
                'attribute' => 'class_level_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return ClassLevel::getAttributeValue(['class_level_id' => $model['class_level_id']], 'class_level_name');
                }
            ],
            [
                'attribute' => 'signed_to_date',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['signed_to_date'], '-', '/');
                }
            ],
            [
                'attribute' => 'start_date',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['start_date'], '-', '/');
                }
            ],
            [
                'attribute' => 'end_date',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['end_date'], '-', '/');
                }
            ],
            [
                'attribute' => 'privacy',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['privacy'] == 1) ? 'Công cộng' : 'Riêng tư';
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model['status'] == 1) {
                        return 'Đang active';
                    } else if ($model['status'] == 0) {
                        return 'Đã kết thúc';
                    } else if ($model['status'] == -1) {
                        return 'Hủy khóa';
                    } else {
                        return '';
                    }
                }
            ],
            [
                'attribute' => 'approved',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model['approved'] == 1) {
                        return 'Đã phê duyệt';
                    } else if ($model['approved'] == 0) {
                        return 'Đang chờ phe duyệt';
                    } else if ($model['approved'] == -1) {
                        return 'Từ chối phe duyệt';
                    }  else {
                        return '';
                    }
                }
            ],
            [
                'attribute' => 'approver',
                'format' => 'raw',
                'value' => function ($model) {
                    return Admin::getAttributeValue(['ad_id' => $model['approver']], 'ad_full_name');
                }
            ],
            [
                'attribute' => 'created_time',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['created_time'], '-', '/', true);
                }
            ],
            [
                'attribute' => 'updated_time',
                'format' => 'raw',
                'value' => function ($model) {
                    return Utility::formatDataTime($model['updated_time'], '-', '/', true);
                }
            ],
        ],
    ]) ?>

</div>

<style>
    .table > tbody > tr > th {
        width: 20%;
    }
</style>
