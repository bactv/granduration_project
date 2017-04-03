<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/04/2017
 * Time: 10:52 CH
 */
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = 'Vật lý - Dao động điều hòa';
$this->params['breadcrumbs'] = [
    ['label' => 'Vật lý'],
    ['label' => 'Dao động diều hòa'],
];
?>

<style>
    .contest_detail {
        width: 50%;
        margin: 0 auto;
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
    <p id="title">Dao động điều hòa</p>
    <div class="detail">
        <p class="f_st_italic">Số câu hỏi: 30 câu</p>
        <p class="f_st_italic">Thời gian làm bài: 30 phút</p>
        <p class="f_st_italic">Số người tham gia: 5000</p>
        <p id="btn-start"><a href="<?php echo Url::toRoute(['quiz/do-contest']) ?>"><?php echo Icon::show('clock-o ') ?> Bắt đầu</a></p>
    </div>
</div>
