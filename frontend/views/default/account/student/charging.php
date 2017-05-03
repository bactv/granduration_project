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

AssetApp::regJsFile('jquery.min.js');
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
                                <a href="javascript:void(0)" class="telco" id="viettel"><img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/viettel_logo.png' ?>"></a></th>
                            </th>
                            <th style="text-align: center;">
                                <a href="javascript:void(0)" class="telco" id="mobifone"><img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/mobifone_logo.png' ?>"></a>
                            </th>
                            <th style="text-align: center;">
                                <a href="javascript:void(0)" class="telco" id="vinaphone"><img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/vinaphone_logo.png' ?>"></a>
                            </th>
                            <th style="text-align: center;">
                                <a href="javascript:void(0)" class="telco" id="vietnamobile"><img src="<?php echo AssetApp::getImageBaseUrl() . '/telco_logo/vietnamobile_logo.png' ?>"></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <?php echo Html::tag('input', '', [
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập số seri ...',
                                'id' => 'serial_number'
                            ]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <?php echo Html::tag('input', '', [
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập mã thẻ ...',
                                'id' => 'code_number'
                            ]) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center">
                            <button type="submit" class="btn btn-primary" onclick="charging()">Nạp tiền</button>
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

<style>
    th.telco_active {
        border: 2px solid #0ead8e !important;
    }
</style>

<script>
    $(document).ready(function () {
        $("a.telco").on('click', function () {
            $("a.telco").removeClass('telco_active');
            $("a.telco").parent().removeClass('telco_active');
            $(this).addClass('telco_active');
            $(this).parent().addClass('telco_active');
        });
    });

    function charging() {
        var telco_type = $("a.telco_active").attr('id');
        var serial_number = $("#serial_number").val();
        var code_number = $("#code_number").val();
        var _csrf = $("meta[name='csrf-token']").attr('content');

        if (telco_type == '') {
            alert("Vui lòng chọn nhà mạng.");
            return false;
        }
        if (serial_number == '') {
            alert("Vui lòng nhập số serial thẻ cào.");
            return false;
        }
        if (code_number == '') {
            alert("Vui lòng nhập mã thẻ cào.");
            return false;
        }

        $.ajax({
            method: 'POST',
            url: '/account/charge-money.html',
            data: {'telco_type' : telco_type, 'serial_number' : serial_number, 'code_number' : code_number, _csrf : _csrf},
            success: function (data) {
                var response = JSON.parse(data);
                alert(response.message);
                window.location = '<?php echo Url::toRoute(['/account/info']) ?>';
            }
        });
    }
</script>