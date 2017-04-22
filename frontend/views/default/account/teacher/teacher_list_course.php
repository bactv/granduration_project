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
use frontend\models\Subject;
use frontend\models\ClassLevel;
use frontend\models\CourseType;
use common\components\Utility;

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
            <?php foreach ($list_course as $k => $course) {
                $url_on_course = '';
                if ($course['approved'] == 1) {
                    $url_on_course = Url::toRoute(['/course/on-course', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]);
                }
                ?>
                <tr>
                    <td class="txt_center"><?php echo ($k + 1) ?></td>
                    <td class="txt_center"><a href="<?php echo $url_on_course  ?>" target="_blank"><?php echo $course['course_name'] ?></a></td>
                    <td class="txt_center"><?php echo Subject::getAttributeValue(['subject_id' => $course['subject_id']], 'subject_name') ?></td>
                    <td class="txt_center"><?php echo ClassLevel::getAttributeValue(['class_level_id' => $course['class_level_id']], 'class_level_name') ?></td>
                    <td class="txt_center"><?php echo CourseType::getAttributeValue(['type_id' => $course['course_type_id']], 'type_name') ?></td>
                    <td class="txt_center"><?php echo number_format($course['price']) ?></td>
                    <td class="txt_center"><?php echo Utility::formatDataTime($course['signed_to_date'], '-', '/') ?></td>
                    <td class="txt_center"><?php echo Utility::formatDataTime($course['start_date'], '-', '/') ?></td>
                    <td class="txt_center"><?php echo Utility::formatDataTime($course['end_date'], '-', '/') ?></td>
                    <td class="txt_center"><?php echo $course['privacy'] == 1 ? 'Công khai' : 'Riêng tư' ?></td>
                    <td class="txt_center">
                        <?php
                        if ($course['approved'] == 1) {
                            echo "ĐÃ PHÊ DUYỆT";
                        } else if ($course['approved'] == 0) {
                            echo "ĐANG CHỜ PHÊ DUYỆT";
                        } else if ($course['approved'] == -1) {
                            echo "ĐÃ TỪ CHỐI";
                        }
                        ?>
                    </td>
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
    .table > tbody > tr > td {
        vertical-align: middle;
    }
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
