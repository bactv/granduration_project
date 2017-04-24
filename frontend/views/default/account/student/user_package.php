<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 04/04/2017
 * Time: 12:00 SA
 */
use frontend\models\Package;
use common\components\Utility;
use yii\helpers\Url;
?>

<style>
    .pk_item {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>

<?php if (count($user_package) > 0) { ?>
    <?php foreach ($user_package as $pk) {
        $package = Package::findOne(['pk_id' => $pk['package_id']]);
        ?>
        <h4>Gói cước đang sử dụng: <?php echo $package->pk_code ?></h4><br>
        <p>Giá gói: <b><i><?php echo number_format($package['pk_price'])  . ' VNĐ /' . $package['pk_duration'] . ' ngày'  ?> </i></b></p>
        <p>Mô tả: <b><i><?php echo $package['pk_description'] ?></i></b></p>
        <p>Ngày hết hạn: <b><i><?php echo Utility::formatDataTime($pk['expire_date'], '-', '/', true) ?></i></b></p>
    <?php } ?>
<?php } else { ?>
    <h4><b>Gói cước đang sử dụng: <i>Bạn chưa đăng ký gói cước nào</i></b></h4>
<?php } ?>
<br>
<br>
<br>

<h4><b>Danh sách các gói cước của hệ thống: </b></h4><br>
<?php foreach ($packages as $pk) {  ?>
    <div class="row pk_item">
        <div class="col-md-6">
            <p>Tên gói: <b><i><?php echo $pk['pk_name'] ?></i></b></p>
            <p>Mã gói: <b><i><?php echo $pk['pk_code'] ?></i></b></p>
            <p>Mô tả: <b><i><?php echo $pk['pk_description'] ?></i></b></p>
            <p>Giá gói: <b><i><?php echo number_format($pk['pk_price']) . ' VNĐ /' . $pk['pk_duration'] . ' ngày' ?></i></b></p>
        </div>
        <div class="col-md-6">
            <p><button type="button" class="btn btn-success" id="btn_reg_pk" data-package_id="<?php echo $pk['pk_id'] ?>">Đăng ký</button></p>
        </div>
    </div>
<?php } ?>

<script>
    $(document).on('click', '#btn_reg_pk', function () {
        var package_id = $(this).data('package_id');
        console.log(package_id);
        var student_id = '<?php echo Yii::$app->user->identity->student_id ?>';
        var _csrf = $("meta[name='csrf_params']").attr('content');

        if (package_id != '' && student_id != '') {
            BootstrapDialog.show({
                title: 'Đăng ký gói cước',
                message: 'Bạn có muốn đăng ký gói cước này không?',
                buttons: [{
                    label: 'Đăng ký',
                    action: function(dialog) {
                        $.ajax({
                            method: 'POST',
                            data: {'package_id' : package_id, 'student_id' : student_id, '_csrf' : _csrf},
                            url: '<?php echo Url::toRoute(['/account/register-package']) ?>',
                            success: function (data) {
                                var res = JSON.parse(data);
                                BootstrapDialog.show({
                                    title: 'Info',
                                    message: res.message
                                });
                            }
                        });
                        dialog.close();
                    }
                }, {
                    label: 'Hủy',
                    action: function(dialog) {
                        dialog.close();
                    }
                }]
            });
        }
    });
</script>

