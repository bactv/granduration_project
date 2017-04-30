<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/04/2017
 * Time: 10:52 CH
 */
use kartik\icons\Icon;
use yii\helpers\Url;
use frontend\models\StudentQuiz;
use frontend\models\Subject;
use common\components\AssetApp;
use common\components\Utility;
use frontend\models\QuizRating;

Icon::map($this, Icon::FA);


$subject_name = Subject::getAttributeValue(['subject_id' => $quiz['subject_id']], 'subject_name');

$this->title = $this->params['title'] = $subject_name . ' - ' . $quiz['quiz_name'];
$this->params['breadcrumbs'] = [
    ['label' => $subject_name],
    ['label' => $quiz['quiz_name']],
];

$info = QuizRating::findAll(['quiz_id' => $quiz['quiz_id']]);

?>

<div class="row quiz_detail">
    <div class="col-md-6 contest_detail">
        <p id="title"><?php echo $quiz['quiz_name'] ?></p>
        <div class="detail">
            <p class="f_st_italic">Số câu hỏi: <?php echo count(json_decode($quiz['question_ids'])) ?> câu</p>
            <p class="f_st_italic">Thời gian làm bài: <?php echo intval($quiz['time']) ?> phút</p>
            <p class="f_st_italic">Số lượt tham gia: <?php echo number_format(count($info)) ?></p>
            <p id="btn-start"><a href="javascript:void(0)" onclick="start_quiz()"><?php echo Icon::show('clock-o ') ?> Bắt đầu</a></p>
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3 leaderboard">
        <p id="title">Bảng xếp hạng</p>
        <ul class="nav nav-tabs">
            <li class="active" style="width: 50%;"><a data-toggle="tab" href="#leaderboard_week">Tuần</a></li>
            <li style="width: 50%;"><a data-toggle="tab" href="#leaderboard_month">Tháng</a></li>
        </ul>

        <div class="tab-content">
            <div id="leaderboard_week" class="tab-pane fade in active">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Điểm trung bình</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>XXX1</td>
                        <td>5.7</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>XXX1</td>
                        <td>5.7</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>XXX1</td>
                        <td>5.7</td>
                    </tr>
                    <tr>
                        <td colspan="3">...</td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td>XXX1</td>
                        <td>5.7</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="leaderboard_month" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .quiz_detail {}
    .quiz_detail .contest_detail {
        margin: 0 auto 150px auto;
        text-align: center;
        border: 1px solid #ccc;
    }
    .quiz_detail .contest_detail > p#title {
        background: #0ead8e;
        padding: 10px;
        color: #fff;
        font-size: 17px;
    }
    .quiz_detail .contest_detail .detail {

    }
    .quiz_detail .contest_detail .detail p#btn-start {
        margin: 30px;
    }
    .quiz_detail .contest_detail .detail p#btn-start a {
        color: #fff;
        background: #337ab7;
        padding: 10px 15px;
    }

    .quiz_detail .leaderboard {
        margin: 0 auto 150px auto;
        text-align: center;
        border: 1px solid #ccc;
    }
    .quiz_detail .leaderboard p#title {
        background: #0ead8e;
        padding: 10px;
        color: #fff;
        font-size: 17px;
    }

</style>




<script>
    function start_quiz() {
        var quiz_id = '<?php echo $quiz['quiz_id'] ?>';
        var _csrf = $("meta[name='csrf_params']").attr('content');

        $.ajax({
            method: 'POST',
            data: {'quiz_id' : quiz_id, '_csrf' : _csrf},
            url: '<?php echo Url::toRoute(['/quiz/check-quiz']) ?>',
            success: function (data) {
                var res = JSON.parse(data);
                if (res.status == 0) {
                    BootstrapDialog.show({
                        title: 'Info',
                        message: res.message
                    });
                } else {
                    window.location = '<?php echo Url::toRoute(['/quiz/do-contest', 'id' => Utility::encrypt_decrypt('encrypt', $quiz['quiz_id'])])?>';
                }
            },
            error: function () {
                BootstrapDialog.show({
                    title: 'Error!',
                    message: 'Có lỗi xảy ra.'
                });
            }
        });
    }
</script>
