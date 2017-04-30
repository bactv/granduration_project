<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 30/04/2017
 * Time: 3:30 CH
 */
use common\components\Utility;
use frontend\models\QuestionAnswer;
use frontend\models\Question;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

?>


<div class="review_contest">
    <div class="box_results">
        <p id="title">Kết quả</p>
        <div class="info">
            <div class="row">
                <div class="col-md-6" id="key">Thời gian làm bài: </div>
                <div class="col-md-6" id="val"><?php echo Utility::formatDataTime($data['info']->{'time_start'}, '-', '/', true) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6" id="key">Thời gian nộp bài: </div>
                <div class="col-md-6" id="val"><?php echo Utility::formatDataTime($data['info']->{'time_submit'}, '-', '/', true) ?></div>
            </div>
            <div class="row">
                <div class="col-md-6" id="key">Số đáp án đúng: </div>
                <div class="col-md-6" id="val"><?php echo $data['info']->{'total_true'} . '/' . $data['info']->{'total_questions'} ?></div>
            </div>
        </div>
    </div>

    <div class="box_solution">
        <p id="title">Bài làm của bạn</p>
        <div class="review">
            <?php foreach ($data['results'] as $k => $item) {
                $question = Question::findOne(['question_id' => $item->{'question_id'}]);
                $answers = QuestionAnswer::findAll(['question_id' => $item->{'question_id'}]);
                $solution = '';
                ?>
                <div class="box_item">
                    <p id="question"><?php echo ($k + 1) . '.' .  $question->question_content ?></p>
                    <ol class="box_ans" type="A">
                        <?php foreach ($answers as $ans) {
                            $my_ans = $item->{'ans_id'};
                            $check = '';
                            if ($my_ans == $ans->ans_id && $item->{'check'} == 1) {
                                $check = 'true';
                            } else if ($my_ans == $ans->ans_id && $item->{'check'} == 0) {
                                $check = 'false';
                            }
                            if ($ans->is_true == 1) {
                                $check = "true";
                                $solution = $ans->soluion;
                            }
                            ?>
                            <li id="<?php echo $check ?>"><?php echo $ans->ans_content ?></li>
                        <?php } ?>
                    </ol>
                    <div class="row">
                        <div class="col-md-6 solution">
                            <a href="javascript:void(0)" id="btn_show_solution" data-ques="<?php echo $item->{'question_id'} ?>"><?php echo Icon::show('info') . ' ' . Yii::t('web', 'Show Solution') ?>  </a>
                            <p id="slt_<?php echo $item->{'question_id'} ?>" style="display: none"><?php echo $solution ?></p>
                        </div>

                        <div class="col-md-6 report">
                            <a href="javascript:void(0)" id="btn_report" data-ques="<?php echo $item->{'question_id'} ?>"><?php echo Icon::show('commenting-o') . ' ' . Yii::t('web', 'Report') ?> </a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<style>
    .review_contest {
        margin-bottom: 30px;
    }
    .review_contest .box_results {
        text-align: center;
        width: 50%;
        margin: 0 auto 30px auto;
        box-shadow: 0 0 10px #ccc;
        padding-bottom: 10px;
    }
    .review_contest .box_results p#title{
        background: #0ead8e;
        padding: 10px;
        color: #FFF;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: bold;
    }
    .review_contest .box_results .info {
        font-weight: bold;
    }
    .review_contest .box_results .info #key {
        text-align: right;
        padding: 5px;
    }
    .review_contest .box_results .info #val{
        color: #4d8394;
        font-weight: bold;
        font-style: italic;
        text-align: left;
        padding: 5px;
    }


    .review_contest .box_solution {
        box-shadow: 0 0 10px #ccc;
        padding-bottom: 10px;
    }
    .review_contest .box_solution p#title{
        background: #0ead8e;
        padding: 10px;
        color: #FFF;
        font-size: 18px;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center;
    }
    .review_contest .box_solution .review {
        padding: 5px 20px;
    }
    .review_contest .box_solution .review .box_item {
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }
    .review_contest .box_solution .review .box_item p#question{
        font-weight: bold;
    }
    .review_contest .box_solution .review .box_item ol.box_ans {
    }
    .review_contest .box_solution .review .box_item ol.box_ans li {
        padding: 5px;
    }
    .review_contest .box_solution .review .box_item ol.box_ans li#true {
        color: green;
        font-weight: bold;
        font-size: 17px;
    }
    .review_contest .box_solution .review .box_item ol.box_ans li#true:before {
        content : '\f00c';
        font-family: FontAwesome;
        margin-right: 10px;
    }
    .review_contest .box_solution .review .box_item ol.box_ans li#false {
        color: red;
    }
    .review_contest .box_solution .review .box_item ol.box_ans li#false:before {
        content : '\f00d';
        font-family: FontAwesome;
        margin-right: 10px;
    }
    .review_contest .box_solution .review .box_item a#btn_show_solution {
    }
    .review_contest .box_solution .review .box_item .solution{
    }
    .review_contest .box_solution .review .box_item .report{
        text-align: right;
    }
    .review_contest .box_solution .review .box_item .report a#btn_report {
    }

</style>

<script>
    $(document).on('click', '#btn_show_solution', function () {
        var qs_id = $(this).data('ques');
        $("p#slt_" + qs_id).toggle(500);
    });
    $(document).on('click', '#btn_report', function () {
        var qs_id = $(this).data('ques');
    });
</script>