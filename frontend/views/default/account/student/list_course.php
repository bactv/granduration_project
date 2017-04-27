<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 24/04/2017
 * Time: 11:44 CH
 */
use frontend\models\Course;
use frontend\models\Teacher;
use common\components\Utility;
use yii\helpers\Url;
?>

<h4><b>Danh sách khoa học đã đăng ký</b></h4><br>
<table class="table table-striped table-hover table-bordered table-condensed">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên khóa học</th>
        <th>Giáo viên</th>
        <th>Ngày đăng ký</th>
        <th>Trạng thái khóa học</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arr_results_signed as $k => $v) {
        static $i = 1;
        $course = Course::findOne(['course_id' => $k]);
        $teacher = Teacher::findOne(['tch_id' => $course['teacher_id']]);
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $course['course_name'] ?></td>
            <td><?php echo $teacher['tch_full_name'] ?></td>
            <td><?php echo Utility::formatDataTime($v['signed_date'], '-', '/', true) ?></td>
            <td>
                <?php
                if ($course['status'] == 1) {
                    echo 'Đang diễn ra';
                } else if ($course['status'] == 2) {
                    echo 'Đã đóng';
                } else if ($course['status'] == 3) {
                    echo 'Đã hủy';
                } else {
                    echo '';
                }
                ?>
            </td>
            <td>
                <a href="<?php echo Url::toRoute(['/course/on-course', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" role="button" class="btn btn-success" target="_blank">Vào lớp</a>
            </td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>

<br>
<br>
<br>

<h4><b>Danh sách khoa học đã học thử</b></h4><br>
<table class="table table-striped table-hover table-bordered table-condensed">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên khóa học</th>
        <th>Giáo viên</th>
        <th>Trạng thái khóa học</th>
        <th>#</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arr_results_not_signed as $k => $v) {
        static $i = 1;
        $course = Course::findOne(['course_id' => $k]);
        $teacher = Teacher::findOne(['tch_id' => $course['teacher_id']]);
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $course['course_name'] ?></td>
            <td><?php echo $teacher['tch_full_name'] ?></td>
            <td>
                <?php
                if ($course['status'] == 1) {
                    echo 'Đang diễn ra';
                } else if ($course['status'] == 2) {
                    echo 'Đã đóng';
                } else if ($course['status'] == 3) {
                    echo 'Đã hủy';
                } else {
                    echo '';
                }
                ?>
            </td>
            <td>
                <a href="<?php echo Url::toRoute(['/course/detail', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" role="button" class="btn btn-warning" target="_blank">Xem</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

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


