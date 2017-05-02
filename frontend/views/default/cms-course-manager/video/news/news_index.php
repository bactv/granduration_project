<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/05/2017
 * Time: 9:40 CH
 */
use common\components\Utility;
use kartik\icons\Icon;
use yii\helpers\Url;
use yii\widgets\LinkPager;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $course['course_name'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::toRoute(['/cms-course-manager/index', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])])];

?>
<div class="news_manager">
    <h3 id="title"><?php echo $course['course_name'] . ' - Quản lý tin tức' ?></h3>
    <p><a href="<?php echo Url::toRoute(['/cms-course-manager/news-create', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" role="button" class="btn btn-success"><?php echo Icon::show('pencil') ?> Thêm mới</a> </p>
    <table class="table table-responsive table-condensed table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_news as $k => $news) { ?>
            <tr>
                <td class="txt_center"><?php echo ($k + 1) ?></td>
                <td><?php echo $news['title'] ?></td>
                <td class="txt_center"><?php echo ($news['status'] == 1) ? 'Active' : 'Deactive' ?></td>
                <td class="txt_center"><?php echo Utility::formatDataTime($news['created_time'], '-', '/', true) ?></td>
                <td class="txt_center"><?php echo Utility::formatDataTime($news['updated_time'], '-', '/', true) ?></td>
                <td class="txt_center">
                    <a href="<?php echo Url::toRoute(['/cms-course-manager/news-view', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $news['id']]) ?>" role="button" class="btn btn-default"><?php echo Icon::show('eye') ?> Xem</a>
                    <a href="<?php echo Url::toRoute(['/cms-course-manager/news-update', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $news['id']]) ?>" role="button" class="btn btn-default"><?php echo Icon::show('edit') ?> Sửa</a>
                    <a href="<?php echo Url::toRoute(['/cms-course-manager/news-delete', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $news['id']]) ?>" role="button" class="btn btn-default"><?php echo Icon::show('trash-o') ?> Xóa</a>
                    <a href="<?php echo Url::toRoute(['/cms-course-manager/news-active', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id']), 'news_id' => $news['id']]) ?>" role="button" class="btn btn-default"><?php echo Icon::show('star-o') ?> Active</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php echo LinkPager::widget([
    'pagination' => $pagination,
]); ?>
<style>
    .txt_center {
        text-align: center;
    }
    .table > tbody > tr > td {
        vertical-align: middle;
    }
    .table > thead > tr > th {
        text-align: center;
        vertical-align: middle;
        font-size: 12px;
        background: #3f587f; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#3f587f, #0f5ddb); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#3f587f, #0f5ddb); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#3f587f, #0f5ddb); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#3f587f, #0f5ddb); /* Standard syntax */
        color: #fff0f0;
    }
    .news_manager #title {
        text-align: center;
        margin-bottom: 30px;
    }
</style>