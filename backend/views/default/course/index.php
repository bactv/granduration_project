<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\icons\Icon;
use yii\grid\GridView;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Agreement;
use backend\models\Party;
use backend\models\Teacher;
use frontend\models\CourseType;
use backend\models\Admin;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>Icon::show('plus') . " " . Yii::t('cms', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>Icon::show('trash-o') . " " . Yii::t('cms', 'Delete'), 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

<div class="row">
    <fieldset>
        <legend>Tìm kiếm khóa học</legend>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Hợp đồng</label>';
                echo Select2::widget([
                    'name' => 'agreement_id',
                    'data' => ArrayHelper::map(Agreement::find()->all(), 'agreement_id', 'agreement_code'),
                    'options' => [
                        'placeholder' => 'Chọn hợp đồng ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Đối tác cung cấp</label>';
                echo Select2::widget([
                    'name' => 'party_id',
                    'data' => ArrayHelper::map(Party::find()->where(['party_type_id' => 1])->all(), 'party_id', 'party_name'),
                    'options' => [
                        'placeholder' => 'Đối tác cung cấp nội dung ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Giáo viên</label>';
                echo Select2::widget([
                    'name' => 'teacher_id',
                    'data' => ArrayHelper::map(Teacher::find()->all(), 'tch_id', 'tch_full_name'),
                    'options' => [
                        'placeholder' => 'Giáo viên dạy ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Hình thức học</label>';
                echo Select2::widget([
                    'name' => 'course_type_id',
                    'data' => ArrayHelper::map(CourseType::find()->all(), 'type_id', 'type_name'),
                    'options' => [
                        'placeholder' => 'Hình thức học ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
        </div>

        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Quyền riêng tư lớp học</label>';
                echo Select2::widget([
                    'name' => 'privacy_id',
                    'data' => [1 => 'Công khai', 2 => 'Riêng tư'],
                    'options' => [
                        'placeholder' => 'Quyền riêng tư ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Học phí</label>';
                echo Select2::widget([
                    'name' => 'price',
                    'data' => [1 => 'Miễn phí', 2 => 'Mất phí'],
                    'options' => [
                        'placeholder' => 'Học phí ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-3 pdr-10">
                <?php
                echo '<label class="control-label">Phê duyệt</label>';
                echo Select2::widget([
                    'name' => 'privacy_id',
                    'data' => [1 => 'Đã phê duyệt', 0 => 'Chưa phê duyệt', -1 => 'Từ chối phê duyệt'],
                    'options' => [
                        'placeholder' => 'Phê duyệt ...',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
                ?>
            </div>
        </div>

        <div class="row" style="text-align: center">
            <div class="form-group">
                <?= Html::submitButton(Icon::show('search') . " " .  Yii::t('cms', 'Search'), ['class' => 'btn btn-primary', 'name' => 'filer_course']) ?>
            </div>
        </div>

    </fieldset>
</div>

<?php $form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => [
        'labelSpan' => 2,
        'deviceSize' => ActiveForm::SIZE_SMALL
    ]
]) ?>




<?php ActiveForm::end() ?>


<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'course_id',
                'options' => ['width' => '50px'],
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'course_name',
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'teacher_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Teacher::getAttributeValue(['tch_id' => $model['teacher_id']], 'tch_full_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'party_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Party::getAttributeValue(['party_id' => $model['party_id']], 'party_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'course_type_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return CourseType::getAttributeValue(['type_id' => $model['course_type_id']], 'type_name');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'price',
                'format' => 'raw',
                'value' => function ($model) {
                    return number_format($model['price']) . ' VNĐ';
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'privacy',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model['price'] == 1) ? 'Công khai' : 'Riêng tư';
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'approved',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model['approved'] == 1) {
                        return 'Đã phê duyệt';
                    } else if ($model['approved'] == -1) {
                        return 'Từ chối phê duyệt';
                    } else if ($model['approved'] == 0) {
                        return 'Đang xem xét';
                    } else {
                        return '';
                    }
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'attribute' => 'approver',
                'format' => 'raw',
                'value' => function ($model) {
                    return Admin::getAttributeValue(['ad_id' => $model['approver']], 'ad_username');
                },
                'headerOptions' => ['style' => 'text-align: center; vertical-align: middle'],
                'contentOptions' => ['style' => 'text-align: center; vertical-align: middle'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{view} {update} {delete} <br><br> {approve} {refuse} {feedback}",
                'header' => Yii::t('cms', 'Actions'),
                'headerOptions' => ['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center;'],
                'options' => ['width' => '120px'],
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a(Icon::show('info-circle'), $url, [
                            'title' => Yii::t('cms', 'View'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a(Icon::show('pencil-square-o'), $url, [
                            'title' => Yii::t('cms', 'Update'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a(Icon::show('trash-o'), $url, [
                            'title' => Yii::t('cms', 'Delete'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => 'w0'
                        ]);
                    },
                    'approve' => function ($url) {
                        return Html::a(Icon::show('check'), $url, [
                            'title' => Yii::t('cms', 'Approved'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to approve this item?'),
                            'data-method' => 'post',
                            'data-pjax' => 'w0'
                        ]);
                    },
                    'refuse' => function ($url) {
                        return Html::a(Icon::show('close'), $url, [
                            'title' => Yii::t('cms', 'Refuse'),
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to refuse this item?'),
                            'data-method' => 'post',
                            'data-pjax' => 'w0'
                        ]);
                    },
                    'feedback' => function ($url, $model) {
                        return Html::a(Icon::show('envelope-o'), 'javascript:void(0)', [
                            'id' => 'show_modal',
                            "data-object" => $model['teacher_id'],
                            "data-toggle" => "modal",
                            "data-target" => "#add_feedback",
                            "class" => "btn btn-primary btn-xs btn-app",
                            'title' => Yii::t('cms', 'Refuse'),
                            'data-pjax' => 'w0'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end();?>

<!-- Modal -->
<div id="add_feedback" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Feedback giáo viên</h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php
                    echo '<label class="control-label">Tiêu đề</label>';
                    echo Html::input('text', '', '', [
                        'class' => 'form-control',
                        'id' => 'title'
                    ]);
                    ?>
                </p>
                <p id="error" class="e_title"></p>
                <p>
                    <?php
                    echo '<label class="control-label">Nội dung</label>';
                    echo CKEditor::widget([
                        'name' => 'feedback_content',
                        'id' => 'feedback_content',
                        'editorOptions' => [
                            'preset' => 'basic',
                            'inline' => false,
                            'rows' => 10
                        ],
                    ]) ?>
                </p>
                <p id="error" class="e_content"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="send_feedback"><?php echo Yii::t('cms', 'Send') ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('cms', 'Cancel') ?></button>
            </div>
        </div>

    </div>
</div>

<script src="/themes/default/js/jquery.min.js"></script>

<script>
    $(document).on('click', '#show_modal', function () {
        var tch_id = $(this).data('object');

        $("#send_feedback").on('click', function () {
            if (tch_id == '') {
                return false;
            }
            var title = $("input#title").val();
            var content = $("#feedback_content").val();

            if (title == '') {
                $("p.e_title").text('Tiêu đề không được để trống');
                return false;
            }
            if (content == '') {
                $("p.e_content").text('Tin nhắn không được để trống');
                return false;
            }
            var _csrf = $("meta[name='csrf-token']").attr('content');
            $.ajax({
                method: 'POST',
                data: {'tch_id' : tch_id, 'content' : content, '_csrf' : _csrf, 'title' : title},
                url: '<?php echo Url::toRoute(['/course/send-feedback-teacher']) ?>',
                success: function (data) {
                    var res = JSON.parse(data);
                    alert(res.message);
                },
                error: function (data) {
                    alert("Có lỗi xảy ra");
                }
            });
        });
    });
</script>

