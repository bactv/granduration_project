<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/05/2017
 * Time: 11:55 CH
 */
use common\components\Utility;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $course['course_name'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cms_course">
    <div class="card">
        <ul class="nav nav-tabs">
            <li class="active" style="width: 33%"><a data-toggle="pill" href="#lesson">Bài học</a></li>
            <li style="width: 33%"><a data-toggle="pill" href="#references" onclick="references_manager()">Tài liệu tham khảo</a></li>
            <li style="width: 33%"><a data-toggle="pill" href="#news" onclick="news_manager()">Thông báo</a></li>
        </ul>

        <div class="tab-content">
            <div id="lesson" class="tab-pane fade in active row">
                <div class="col-md-5">
                    <fieldset style="margin-bottom: 20px">
                        <legend>Danh sách bài học</legend>
                        <table class="table table-striped table-hover table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Bài học</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lessons as $k => $lesson) { ?>
                                <tr>
                                    <td class="txt_center"> <?php echo ($k + 1) ?></td>
                                    <td><a href="javascript:void(0)" id="show_info_lesson" data-value="<?php echo $lesson['id'] ?>"><?php echo $lesson['lesson_name'] ?></a></td>
                                    <td class="txt_center"><?php echo ($lesson['status'] == 1) ? 'Active' : 'Inactive' ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="lesson_info"></div>
                </div>
            </div>
            <div id="references" class="tab-pane fade"></div>
            <div id="news" class="tab-pane fade"></div>
        </div>
    </div>
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
    .cms_course {
        margin-bottom: 100px;
    }
    .cms_course p#title {
        font-weight: bold;
    }
</style>

<script>
    $(document).on('click', '#show_info_lesson', function () {
        var lesson_id = $(this).data('value');
        $.ajax({
            method: 'GET',
            data: {'lesson_id' : lesson_id, 'course_type_id' : '<?php echo $course['course_type_id'] ?>', 'course_id' : '<?php echo Utility::encrypt_decrypt('encrypt', $course['course_id']) ?>'},
            url: '<?php echo Url::toRoute(['/cms-course-manager/lesson-info']) ?>',
            success: function (data) {
                $("div.lesson_info").html(data);
            }
        });
    });

    function references_manager() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo Utility::encrypt_decrypt('encrypt', $course['course_id']) ?>'},
            url: '<?php echo Url::toRoute(['/cms-course-manager/references']) ?>',
            success: function (data) {
                $("div#references").html(data);
            }
        });
    }

    function news_manager() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo Utility::encrypt_decrypt('encrypt', $course['course_id']) ?>'},
            url: '<?php echo Url::toRoute(['/cms-course-manager/news']) ?>',
            success: function (data) {
                $("div#news").html(data);
            }
        });
    }
</script>
