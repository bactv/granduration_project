<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 28/03/2017
 * Time: 9:12 CH
 */
use yii\helpers\Html;
use frontend\models\Question;
use frontend\models\QuestionAnswer;
use common\components\AssetApp;
use yii\helpers\Url;
use common\components\Utility;

?>

<style>
    .quiz_title {
        text-align: center;
        border: 1px solid #ccc;
        width: 50%;
        margin: 0 auto 30px auto;
        padding: 10px;
    }
    .quiz_title p#name {
        font-size: 16px;
        font-weight: bold;
    }
    .quiz_title p#time {

    }
    .list_questions {
        float: left;
        padding: 10px;
        border: 1px solid #ccc;
    }
    .form-answer {
        width: 28%;
        height: 600px;
        float: left;
        margin-left: 20px;
        overflow-y: scroll;
        padding: 10px;
        border: 1px solid #ccc;
    }
    .box_question {
        padding: 5px;
        border-bottom: 1px dotted #ccc;
    }
    .box_question:last-child {
        padding: 5px;
        border-bottom: none;
    }
    .box_question #question_content {
        font-weight: bold;
    }
    .box_question #question_content ol.box_answer {

    }
    li#ans {
        margin-bottom: 10px;
    }
    .form-answer .box_answer {
        height: 50px;
        margin-bottom: 10px;
        position: relative;
    }
    .form-answer .box_answer #ques_number {
        float: left;
    }
    .form-answer .box_answer .list_ans {
        height: 50px;
        position: absolute;
        width: 100%;
    }
    .form-answer .box_answer .list_ans ol {

    }
    .form-answer .box_answer .list_ans ol li {
        width: 25%;
        float: left;
    }
    input[type='radio'] {
        display:inline-block;
        width:19px;
        height:19px;
        margin:-1px 4px 0 0;
        vertical-align:middle;
        cursor:pointer;
        -moz-border-radius:  50%;
        border-radius:  50%;
    }
    .time_run {
        text-align: center;
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding: 7px 0;
        background: #0ead8e;
        color: #ffffff;
        width: 10%;
        float: right;
    }
    .time_run #time_run {
        font-size: 20px;
        font-family: monospace;
    }

</style>

<style>
    .do_contest {
        width: 80%;
        margin: 0 auto;
    }
</style>

<div class="time_run">
    <p>Kết thúc bài thi</p>
    <p id="time_run">
        <?php echo $quiz['time'] . ':00' ?>
    </p>
</div>
<div class="do_contest">
    <div class="quiz_title">
        <p id="name"><?php echo $quiz['quiz_name'] ?></p>
        <p id="time"><i>Thời gian: <?php echo $quiz['time'] . ' phút' ?></i></p>
    </div>

    <div class="row">
        <div class="list_questions">
            <?php
            $question_ids = json_decode($quiz['question_ids']);
            foreach ($question_ids as $k => $question_id) {
                $question = Question::find()->where(['question_id' => $question_id])->one();
                $answers = QuestionAnswer::find()->where(['question_id' => $question_id])->all();
                ?>
                <div class="box_question">
                    <p id="question_content"><?php echo ($k + 1) . ". " . $question['question_content'] ?></p>
                    <ol class="box_answer" type="A">
                        <?php foreach ($answers as $ans) { ?>
                            <li id="ans">
                                <input type="radio" class="form-check-input" name="<?php echo $question_id ?>" value="<?php echo $ans['ans_id'] ?>">
                                <?php echo $ans['ans_content'] ?>
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row" style="text-align: center;margin: 30px 0 30px 0">
        <?php echo Html::a('Nộp bài', 'javascript:void(0)', ['class' => 'btn btn-primary', 'onclick' => 'submit_quiz()']) ?>
        <?php echo Html::a('Hủy', 'javascript:void(0)', ['class' => 'btn btn-danger']) ?>
    </div>
</div>


<?php $time_start = time(); // thời gian bắt đầu làm bài ?>

<script src="/themes/default/js/jquery.sticky-kit.min.js"></script>
<script>
    $(document).ready(function () {
        $('.time_run').stick_in_parent();
    });
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var minus = '<?php echo $quiz['time'] * 60 ?>';
        var display = document.querySelector('#time_run');
        startTimer(minus, display);
    };
    
    function submit_quiz() {
        var time_start = '<?php echo $time_start; ?>';

        var arr_radio = [];
        $("input[type='radio']").each(function () {
            arr_radio.push($(this).attr('name'));
        });
        arr_radio = jQuery.unique(arr_radio);
        var arr_selected = [];
        for (var i = 0; i < arr_radio.length; i++) {
            arr_selected[i] = {'question_id' : arr_radio[i], 'ans_id' : ''};
        }

        var count_ans = 0;
        for (var j = 0; j < arr_radio.length; j++) {
            $("input:radio[name='" + arr_radio[j] + "']").each(function () {
                if ($(this).is(':checked')) {
                    arr_selected[j].ans_id = $(this).attr('value');
                    count_ans++;
                }
            });
        }

        var total_ques = '<?php echo intval(count($question_ids)) ?>';
        if (count_ans < total_ques) {
            var message = "Bài thi chưa hoàn thiện, bạn có muốn nộp bài ngay hay không?";
        } else {
            message = "Bạn có muốn nộp bài hay không?";
        }

        var _csrf = $("meta[name='csrf-param']").attr('content');
        var data = {'_csrf' : _csrf, 'time_start' : time_start, 'data' : arr_selected};

        BootstrapDialog.show({
            title: 'Nộp bài',
            message: message,
            buttons: [{
                label: 'Nộp bài',
                cssClass: 'btn-success',
                action: function(dialog) {
                    $.ajax({
                        method: 'POST',
                        data: data,
                        url: '<?php echo Url::toRoute(['/quiz/check-contest']) ?>',
                        success: function (data) {
                            var res = JSON.parse(data);
                            var attempt_id = res.attempt_id;
                            window.location = '<?php echo Url::toRoute(['/quiz/review-contest']) ?>' + '?attempt_id=' + attempt_id;
                        }
                    });
                    dialog.close();
                }
            }, {
                label: 'Hủy',
                cssClass: 'btn-warning',
                action: function(dialog) {
                    dialog.close();
                }
            }]
        });
    }

</script>