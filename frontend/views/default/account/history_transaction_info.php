<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 29/03/2017
 * Time: 11:44 CH
 */
?>

<div class="history_transaction">
    <div class="item">
        <p class="txt_center m_color f_s_20 name">Lịch sử nạp tiền</p>
        <table class="table table-responsive table-condensed table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Thời gian</th>
                <th>Số tiền</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($history_charging) && count($history_charging) > 0) { ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="txt_center f_st_italic">Chưa có giao dịch</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="item">
        <p class="txt_center m_color f_s_20 name">Lịch sử giao dịch</p>
        <table class="table table-responsive table-condensed table-hover table-bordered table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Thời gian</th>
                <th>Gói</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($history_charging) && count($history_charging) > 0) { ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" class="txt_center f_st_italic">Chưa có giao dịch</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
