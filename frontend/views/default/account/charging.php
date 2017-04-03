<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/04/2017
 * Time: 12:59 SA
 */

use common\components\AssetApp;
use kartik\icons\Icon;
use yii\helpers\Url;
use kartik\helpers\Html;

$this->title = $this->params['title'] = 'Nạp tiền vào tài khoản';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this, Icon::FA);
?>
<style>
    .charging {

    }

    .charging p#title {
        font-size: 30px;
        margin-bottom: 20px;
    }
    .charging .nav-tabs {
    }
    .charging .tab-content {
        padding: 20px 10px;
    }
    .charging .nav-tabs > li {
        width: 50%;
        text-align: center;
    }
    .charging .nav-tabs > li a {
        font-size: 17px;
        text-transform: uppercase;
    }
    .nav-tabs > li.active {

    }
    table th img {
        width: 70px;
        height: 50px;
    }
</style>


<div class="charging">
    <p id="title" class="m_color txt_center">Nạp tiền vào tài khoản</p>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#phone_card">Nạp tiền bằng thẻ điện thoại</a></li>
        <li><a data-toggle="tab" href="#banking">Nạp tiền qua ngân hàng</a></li>
    </ul>

    <div class="tab-content">
        <div id="phone_card" class="tab-pane fade in active">
            <div class="col-md-6">
                <h3>Hướng dẫn nạp tiền qua thẻ cào điện thoại</h3>
                <p>1. Nhập chính xác mã thẻ và seri. Nếu mã thẻ đúng, số seri sai thẻ sẽ không nạp được.</p>
                <p>2. Nhập đúng định dạng của các loại thẻ theo mẫu dưới đây. Không điền thêm khoảng trắng, những ký tự gạch ngang...</p>
                <p>3. Nạp thẻ thành công tài khoản sẽ được cộng tiền ngay lập tức</p>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-bordered table-hover table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="text-align: center;">
                                <img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/viettel_logo.png' ?>">
                            </th>
                            <th style="text-align: center;">
                                <img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/mobifone_logo.png' ?>">
                            </th>
                            <th style="text-align: center;">
                                <img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/vinaphone_logo.png' ?>">
                            </th>
                            <th style="text-align: center;">
                                <img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/vietnamobile_logo.png' ?>">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <?php echo Html::tag('input', '', [
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập số seri ...'
                            ]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <?php echo Html::tag('input', '', [
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập mã thẻ ...'
                            ]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="">Nạp tiền</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="banking" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
        </div>
    </div>
</div>
