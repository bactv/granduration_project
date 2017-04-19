<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 19/04/2017
 * Time: 10:41 CH
 */
use kartik\helpers\Html;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

?>

<div class="course_action" style="margin-bottom: 20px">
    <?php echo Html::a(Icon::show('plus-circle') . Yii::t('web', 'Create Course'), Url::toRoute(['/account/create-course']),[
        'role' => 'button',
        'class' => 'btn btn-info',
    ]) ?>
</div>

<div class="list_course_open">
    <table class="table table-responsive table-condensed table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Khóa học</th>
            <th>Môn học</th>
            <th>Trình độ lớp</th>
            <th>Hình thức học</th>
            <th>Học phí</th>
            <th>Hạn đăng ký</th>
            <th>Ngày khai giảng</th>
            <th>Ngày bế giảng</th>
            <th>Quyền riêng tư</th>
            <th>Tình trạng</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($list_course) && count($list_course) > 0) { ?>
            <?php foreach ($list_course as $course) { ?>
                <tr>

                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="11" class="txt_center f_st_italic">Bạn chưa mở lớp nào</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<style>
    .table > thead > tr > th {
        text-align: center;
        vertical-align: middle;
        font-size: 12px;
        background: #3f587f; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#3f587f, #0f5ddb); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#3f587f, #0f5ddb); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#3f587f, #0f5ddb); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#3f587f, #0f5ddb); /* Standard syntax */
        color: #fff0f0;
    },
</style>
