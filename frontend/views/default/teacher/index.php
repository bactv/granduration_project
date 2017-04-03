<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/04/2017
 * Time: 10:04 SA
 */
use kartik\helpers\Html;
use common\components\AssetApp;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = 'Giáo viên';
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
    .search_teacher {
        width: 90%;
        margin: 0 auto 20px auto;
    }

    .list_teacher {
        width: 90%;
        margin: 0 auto;
    }
    .list_teacher .item {
        width: 250px;
        margin-bottom: 20px;
        margin-right: 10px;
    }
    .list_teacher .item .avatar {
        width: 100%;
        height: 330px;
    }
    .list_teacher .item .avatar img {
        width: 100%;
        height: 330px;
    }
    .list_teacher .item .tch_info {
        border: 1px solid #ccc;
        padding: 10px 5px;
    }
    .list_teacher .item .tch_info #tch_name {
        color: blue;
        font-weight: bold;
    }
    .list_teacher .item .tch_info #tch_work_place {
        font-weight: bold;
    }
    .list_teacher .item .tch_info #tch_intro {
        font-style: italic;
    }
    .list_teacher .item .tch_info #tch_detail {
        margin: 0;
        text-align: right;
        font-style: italic;
        color: blueviolet;
    }

</style>

<div class="row search_teacher">
    <div class="col-md-3">
        <?php echo Html::dropDownList('class', '', [1 => 'Lớp 1', 2 => 'Lớp 2', 3 => 'Lớp 3'], [
            'class' => 'form-control',
            'prompt' => 'Chọn lớp',
            'style' => 'width: 90%;'
        ]) ?>
    </div>
    <div class="col-md-3">
        <?php echo Html::dropDownList('subject', '', [1 => 'Toán học', 2 => 'Văn học', 3 => 'Sinh học'], [
            'class' => 'form-control',
            'prompt' => 'Chọn môn',
            'style' => 'width: 90%;'
        ]) ?>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-default" onclick="search_course()">Tìm kiếm</button>
    </div>
</div>

<div class="row list_teacher">
    <div class="col-md-4 item">
        <div class="avatar">
            <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai.JPG' ?>"></a>
        </div>
        <div class="tch_info">
            <p id="tch_name">Thầy: Phan Huy Khải</p>
            <p id="tch_work_place">Viện Toán Học Việt Nam</p>
            <p id="tch_intro">Tác giả hơn 115 đầu sách tham khảo về Toán học. </p>
            <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">Chi tiết >> </a></p>
        </div>
    </div>

    <div class="col-md-4 item">
        <div class="avatar">
            <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai_2.JPG' ?>"></a>
        </div>
        <div class="tch_info">
            <p id="tch_name">Thầy: Phan Huy Khải</p>
            <p id="tch_work_place">Viện Toán Học Việt Nam</p>
            <p id="tch_intro">Tác giả hơn 115 đầu sách tham khảo về Toán học. </p>
            <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">Chi tiết >> </a></p>
        </div>
    </div>

    <div class="col-md-4 item">
        <div class="avatar">
            <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai_3.JPG' ?>"></a>
        </div>
        <div class="tch_info">
            <p id="tch_name">Thầy: Phan Huy Khải</p>
            <p id="tch_work_place">Viện Toán Học Việt Nam</p>
            <p id="tch_intro">Tác giả hơn 115 đầu sách tham khảo về Toán học. </p>
            <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">Chi tiết >> </a></p>
        </div>
    </div>

    <div class="col-md-4 item">
        <div class="avatar">
            <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai_4.JPG' ?>"></a>
        </div>
        <div class="tch_info">
            <p id="tch_name">Thầy: Phan Huy Khải</p>
            <p id="tch_work_place">Viện Toán Học Việt Nam</p>
            <p id="tch_intro">Tác giả hơn 115 đầu sách tham khảo về Toán học. </p>
            <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">Chi tiết >> </a></p>
        </div>
    </div>

    <div class="col-md-4 item">
        <div class="avatar">
            <a href="<?php echo Url::toRoute(['/teacher/detail']) ?>"><img src="<?php echo AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai.JPG' ?>"></a>
        </div>
        <div class="tch_info">
            <p id="tch_name">Thầy: Phan Huy Khải</p>
            <p id="tch_work_place">Viện Toán Học Việt Nam</p>
            <p id="tch_intro">Tác giả hơn 115 đầu sách tham khảo về Toán học. </p>
            <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail']) ?>">Chi tiết >> </a></p>
        </div>
    </div>
</div>
