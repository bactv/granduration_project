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

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = 'Luyện thi trắc nghiệm online';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php AssetApp::regJsFilePlugin('jquery.rateyo.js', 'rateyo') ?>
<?php AssetApp::regCssFilePlugin('jquery.rateyo.css', 'rateyo') ?>

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
        text-align: center;
    }
    .list_contest .item a {
    }
    .rateYoYo {
        float: left;
    }
    td#rate {
        line-height: 43px;
    }
</style>

<div class="row search_contest">
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
    <div class="col-md-3">
        <button type="submit" class="btn btn-default" onclick="search_course()">Tìm kiếm</button>
    </div>
</div>

<div class="row list_contest">
    <div class="row" style="border: 1px solid #ccc;margin-bottom: 20px">
        <p id="title">Toán học</p>
        <div class="row item">
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <td colspan="5"><p id="title"><?php echo Icon::show('clock-o') ?>Kiểm tra 15 phút</p></td>
                </tr>
                <tr>
                    <th>Chủ đề</th>
                    <th>Số câu hỏi</th>
                    <th>Số người tham gia</th>
                    <th>Đánh giá</th>
                    <th>Phí</th>
                </tr>
                <tr>
                    <td><a href="<?php echo Url::toRoute(['/quiz/detail']) ?>"><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo1" class="rateYoYo"></div> (300 lượt)</td>
                    <td>300 xu</td>
                </tr>
                <tr>
                    <td><a href=""><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo2" class="rateYoYo"></div></td>
                    <td>300 xu</td>
                </tr>
                <tr>
                    <td><a href=""><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo3" class="rateYoYo"></div></td>
                    <td>300 xu</td>
                </tr>
            </table>
        </div>


        <div class="row item">
            <table class="table table-striped table-hover table-bordered table-condensed">
                <tr>
                    <td colspan="5"><p id="title"><?php echo Icon::show('clock-o') ?>Kiểm tra 15 phút</p></td>
                </tr>
                <tr>
                    <th>Chủ đề</th>
                    <th>Số câu hỏi</th>
                    <th>Số người tham gia</th>
                    <th>Đánh giá</th>
                    <th>Phí</th>
                </tr>
                <tr>
                    <td><a href=""><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo4" class="rateYoYo"></div></td>
                    <td>300 xu</td>
                </tr>
                <tr>
                    <td><a href=""><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo5" class="rateYoYo"></div></td>
                    <td>300 xu</td>
                </tr>
                <tr>
                    <td><a href=""><?php echo Icon::show('address-card-o') ?> Dao động điều hòa</a></td>
                    <td>33 câu hỏi</td>
                    <td>300 người</td>
                    <td id="rate"><div id="rateYo6" class="rateYoYo"></div></td>
                    <td>300 xu</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#rateYo1").rateYo({
            rating: 3.6
        });
        $("#rateYo2").rateYo({
            rating: 4
        });
        $("#rateYo3").rateYo({
            rating: 6
        });
        $("#rateYo4").rateYo({
            rating: 5
        });
        $("#rateYo5").rateYo({
            rating: 2
        });
        $("#rateYo6").rateYo({
            rating: 1
        });
    });
</script>