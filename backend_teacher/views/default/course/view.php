<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use common\components\Utility;
use backend_teacher\models\ClassLevel;
use backend_teacher\models\Subject;
use backend_teacher\models\CourseType;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend_teacher\models\Course */

$this->title = $model->course_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#course_info"  data-toggle="tab">Thông tin khóa học</a></li>
        <li><a data-toggle="tab" href="#course_references" onclick="course_references()">Tài liệu tham khảo</a></li>
        <li><a data-toggle="tab" href="#course_news" onclick="course_news()">Thông báo, tin tức</a></li>
        <li><a data-toggle="tab" href="#course_student" onclick="course_student()">Danh sách học sinh</a></li>
    </ul>

    <div class="tab-content">
        <div id="course_info" class="tab-pane fade in active">
            <div class="course-view">

                <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('app', 'Update'), ['update', 'id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Icon::show('trash-o') . " " .Yii::t('app', 'Delete'), ['delete', 'id' => $model->course_id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
                                return ($model['privacy'] == 1) ? 'Công khai' : 'Riêng tư';
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
        </div>
        <div id="course_references" class="tab-pane fade"></div>
        <div id="course_news" class="tab-pane fade"></div>
        <div id="course_student" class="tab-pane fade"></div>
    </div>
</div>

<style>
    .table > tbody > tr > th {
        width: 20%;
    }
    .tab-content {
        padding-top: 30px;
    }
</style>

<script>
    function course_references() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/references']) ?>',
            success: function (data) {
                $("#course_references").html(data);
            }
        })
    }
    function course_news() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/news']) ?>',
            success: function (data) {
                $("#course_news").html(data);
            }
        })
    }
    function course_student() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/students']) ?>',
            success: function (data) {
                $("#course_student").html(data);
            }
        })
    }

    $(document).ready(function () {
        // Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show') ;
        }

        // With HTML5 history API, we can easily prevent scrolling!
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            if(history.pushState) {
                history.pushState(null, null, e.target.hash);
            } else {
                window.location.hash = e.target.hash; //Polyfill for old browsers
            }
        });

        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/references']) ?>',
            success: function (data) {
                $("#course_references").html(data);
            }
        });

        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/news']) ?>',
            success: function (data) {
                $("#course_news").html(data);
            }
        });

        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $model->course_id ?>'},
            url: '<?php echo Url::toRoute(['/course/students']) ?>',
            success: function (data) {
                $("#course_student").html(data);
            }
        })

    });
</script>
