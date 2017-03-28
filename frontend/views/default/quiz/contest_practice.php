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

?>
<?php AssetApp::regJsFile('jquery.sticky-kit.min.js') ?>
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
        width: 70%;
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
    }
    .time_run #time_run {
        font-size: 20px;
        font-family: monospace;
    }

</style>

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
                    <input type="radio" class="form-check-input" name="ans_<?php echo $question_id ?>" value="<?php echo $ans['ans_id'] ?>">
                    <?php echo $ans['ans_content'] ?>
                </li>
            <?php } ?>
            </ol>
        </div>
    <?php } ?>
</div>

<div class="form-answer">
    <div class="time_run">
        <p>Kết thúc bài thi</p>
        <p id="time_run">
            <?php echo $quiz['time'] . ':00' ?>
        </p>
    </div>
   <?php
       $question_ids = json_decode($quiz['question_ids']);
       foreach ($question_ids as $k => $question_id) {
           $answers = QuestionAnswer::find()->where(['question_id' => $question_id])->all();
       ?>
           <div class="box_answer">
               <span id="ques_number"><?php echo ($k + 1) ?></span>
               <div class="list_ans">
                   <ol type="A">
                       <?php foreach ($answers as $ans) { ?>
                           <li>
                               <input type="radio" class="form-check-input" name="ans_<?php echo $question_id ?>" value="<?php echo $ans['ans_id'] ?>">
                           </li>
                       <?php } ?>
                   </ol>
               </div>
           </div>
   <?php } ?>
</div>
</div>

<div class="row" style="text-align: center;margin-top: 30px">
    <?php echo Html::a('Nộp bài', 'javascript:void(0)', ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a('Hủy', 'javascript:void(0)', ['class' => 'btn btn-danger']) ?>
</div>

<script>
    $(document).ready(function () {
        $('.form-answer').stick_in_parent();
    });
</script>

<script>
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
</script>