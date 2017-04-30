<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/04/2017
 * Time: 10:35 SA
 */
use kartik\helpers\Html;
use kartik\icons\Icon;
use common\components\AssetApp;
use yii\helpers\Url;
use frontend\models\Subject;
use frontend\models\ClassLevel;
use yii\helpers\ArrayHelper;
use frontend\models\QuizType;
use common\components\Utility;
use frontend\models\StudentQuiz;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = 'Luyện thi trắc nghiệm online';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .search_contest {
        margin-bottom: 20px;
    }
    .list_contest {

    }
    .list_contest > .row > p#title {
        text-align: center;
        padding: 5px;
        background-color: rgba(84, 8, 8, 0.07);
        font-size: 17px;
        font-weight: bold;
    }
    .list_contest .item {
        padding: 5px;
    }
    .list_contest .item  p#title {
        color: orange;
        font-size: 16px;
        text-align: left;
    }
    .list_contest .item a {
    }
    .rateYoYo {
        float: left;
    }
    td#rate {
        line-height: 43px;
    }
    .table > tbody > tr > td {
        vertical-align: middle;
    }
</style>

<div class="row search_contest">
    <div class="col-md-3">
        <?php echo Html::dropDownList('class_id', $class_id, ArrayHelper::map(ClassLevel::find()->orderBy('class_level_id ASC')->all(), 'class_level_id', 'class_level_name'), [
            'class' => 'form-control',
            'style' => 'width: 90%;',
            'id' => 'class_id'
        ]) ?>
    </div>
    <div class="col-md-3">
        <?php echo Html::dropDownList('subject_id', $subject_id, ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'), [
            'class' => 'form-control',
            'prompt' => '-- Chọn môn --',
            'style' => 'width: 90%;',
            'id' => 'subject_id'
        ]) ?>
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-success" onclick="search_list_quiz()"><?php echo Icon::show('search') ?>Tìm kiếm</button>
    </div>
</div>

<div class="row list_contest">
    <?php foreach ($results as $k => $subjects) {
        $subject_name = Subject::getAttributeValue(['subject_id' => $k], 'subject_name');
        ?>
        <div class="row" style="border: 1px solid #ccc;margin-bottom: 20px">
            <p id="title"><?php echo $subject_name ?></p>
            <?php foreach ($subjects as $k2 => $q_types) {
                $quiz_type_name = QuizType::getAttributeValue(['quiz_type_id' => $k2], 'quiz_type_name');
                ?>
                <div class="row item">
                    <table class="table table-striped table-hover table-bordered table-condensed">
                        <tr>
                            <td colspan="6"><p id="title"><?php echo Icon::show('clock-o') ?><?php echo $quiz_type_name ?></p></td>
                        </tr>
                        <tr>
                            <th style="width: 40%;text-align: center">Chủ đề</th>
                            <th style="width: 9%;text-align: center">Số câu hỏi</th>
                            <th style="width: 15%;text-align: center">Số người tham gia</th>
                            <th style="text-align: center">Đánh giá</th>
                            <th style="text-align: center">VIP</th>
                            <th style="width: 9%;text-align: center">Phí</th>
                        </tr>
                        <?php foreach ($q_types as $quiz) {
                            $info = StudentQuiz::get_info($quiz['quiz_id']);
                            $rate = (number_format($info['total_point_rate'] / 10, 1));
                            ?>
                            <tr>
                                <td><a href="<?php echo Url::toRoute(['/quiz/detail', 'id' => Utility::encrypt_decrypt('encrypt', $quiz['quiz_id'])]) ?>"><?php echo Icon::show('address-card-o') ?> <?php echo $quiz['quiz_name'] ?></a></td>
                                <td style="text-align: center;"><?php echo count(json_decode($quiz['question_ids'])) ?></td>
                                <td style="text-align: center"><?php echo number_format($info['total_student']) ?></td>
                                <td style="text-align: center"><b><?php echo $rate ?>/10</b> <i style="font-size: 11px;"> (<?php echo number_format(intval($info['total_student_rate'])) ?> người)</i></td>
                                <td style="text-align: center">
                                    <?php
                                    if ($quiz['vip'] == 1) {
                                        echo Icon::show('check', ['style' => 'color: blue']);
                                    } else {
                                        echo Icon::show('close', ['style' => 'color: red']);
                                    }
                                    ?>
                                </td>
                                <td style="text-align: center"><?php echo number_format($quiz['price']) . ' VNĐ' ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6" style="text-align: right"><a href="<?php echo Url::toRoute(['/quiz/list-contest', 'subject_id' => $k, 'class_id' => $class_id, 'quiz_type_id' => $k2]) ?>"><b><i style="font-size: 12px;">Xem thêm >></i></b></a></td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>