<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/05/2017
 * Time: 8:53 SA
 */
use yii\helpers\Url;
use kartik\icons\Icon;
use kartik\helpers\Html;
use yii\bootstrap\Alert;

Icon::map($this, Icon::FA);

?>
<?php if (Yii::$app->session->hasFlash('error')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-danger'],
        'body' => Yii::$app->session->getFlash('error'),
    ]);
} else if (Yii::$app->session->hasFlash('success')) {
    echo Alert::widget([
        'options' => ['class' => 'alert-success'],
        'body' => Yii::$app->session->getFlash('success'),
    ]);
} ?>

<a href="javascript:void(0)" role="button" class="btn btn-success" style="margin-bottom: 20px", onclick="add_references()"><?php echo Icon::show('pencil-square-o') ?> Thêm mới</a>

<h3 style="margin-bottom: 20px">Danh sách tài liệu tham khảo</h3>
<?php foreach ($allFiles as $file) {?>
    <ol type="I">
        <li>
            <a href="<?php echo $file['link'] ?>" target="_blank"><?php echo $file['name'] ?></a>
            <?= Html::a(Icon::show('close'), Url::toRoute(['/course/delete-references', 'file' => $file['path'], 'course_id' => $course['course_id']]), [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </li>
    </ol>
<?php } ?>

<script>
    function add_references() {
        $.ajax({
            method: 'GET',
            data: {'course_id' : '<?php echo $course['course_id'] ?>'},
            url: '<?php echo Url::toRoute(['/course/add-references']) ?>',
            success: function (data) {
                $("#course_references").html(data);
            }
        });
    }
</script>
