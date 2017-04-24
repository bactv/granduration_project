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

Icon::map($this, Icon::FA);


$subject_name = Subject::getAttributeValue(['subject_id' => $quiz['subject_id']], 'subject_name');

$this->title = $this->params['title'] = $subject_name . ' - ' . $quiz['quiz_name'];
$this->params['breadcrumbs'] = [
    ['label' => $subject_name],
    ['label' => $quiz['quiz_name']],
];

$info = StudentQuiz::get_info($quiz['quiz_id']);

?>

<style>
    .contest_detail {
        width: 50%;
        margin: 0 auto 150px auto;
        text-align: center;
        border: 1px solid #ccc;
    }
    .contest_detail > p#title {
        background: #0ead8e;
        padding: 10px;
        color: #fff;
        font-size: 17px;
    }
    .contest_detail .detail {

    }
    .contest_detail .detail p#btn-start {
        margin: 30px;
    }
    .contest_detail .detail p#btn-start a {
        color: #fff;
        background: #337ab7;
        padding: 10px 15px;
    }

</style>

<div class="row contest_detail">
    <p id="title"><?php echo $quiz['quiz_name'] ?></p>
    <div class="detail">
        <p class="f_st_italic">Số câu hỏi: <?php echo count(json_decode($quiz['question_ids'])) ?> câu</p>
        <p class="f_st_italic">Thời gian làm bài: <?php echo intval($quiz['time']) ?> phút</p>
        <p class="f_st_italic">Số người tham gia: <?php echo number_format($info['total_student']) ?></p>
        <p id="btn-start"><a href="javascript:void(0)" onclick="start_quiz()"><?php echo Icon::show('clock-o ') ?> Bắt đầu</a></p>
    </div>
</div>

<script src="/themes/default/js/jquery.min.js"></script>
<?php AssetApp::regJsFile('jquery.sticky-kit.min.js', true) ?>
<?php AssetApp::regJsFile('bootstrap.min.js', true) ?>
<?php AssetApp::regCssFilePlugin('dist/css/bootstrap-dialog.css', 'bootstrap3-dialog-master') ?>
<?php AssetApp::regJsFilePlugin('dist/js/bootstrap-dialog.js', 'bootstrap3-dialog-master', true) ?>

<script>
    function start_quiz() {
        var quiz_id = '<?php echo $quiz['quiz_id'] ?>';
        var _csrf = $("meta[name='csrf_params']").attr('content');

        console.log(quiz_id);

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
