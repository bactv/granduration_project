<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/05/2017
 * Time: 9:54 CH
 */
use common\components\Utility;
use kartik\icons\Icon;
use yii\helpers\Url;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $course['course_name'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::toRoute(['/course/on-course', 'id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])])];

?>

<div class="row cms_manager">
    <h3 id="title">Quản lý khóa học: <?php echo $course['course_name'] ?></h3>
    <div class="col-md-4 item">
        <a href="<?php echo Url::toRoute(['cms-course-manager/lesson', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" target="_blank">
            <div class="panel panel-default box_outer">
                <div class="panel-heading box">
                    <div id="logo"><?php echo Icon::show('list') ?></div>
                    <div id="category">Danh sách bài học</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 item">
        <a href="<?php echo Url::toRoute(['cms-course-manager/references', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" target="_blank">
            <div class="panel panel-default box_outer">
                <div class="panel-heading box">
                    <div id="logo"><?php echo Icon::show('book') ?></div>
                    <div id="category">Tài liệu tham khảo</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 item">
        <a href="<?php echo Url::toRoute(['cms-course-manager/news', 'course_id' => Utility::encrypt_decrypt('encrypt', $course['course_id'])]) ?>" target="_blank">
            <div class="panel panel-default box_outer">
                <div class="panel-heading box">
                    <div id="logo"><?php echo Icon::show('newspaper-o') ?></div>
                    <div id="category">Tin tức, thông báo</div>
                </div>
            </div>
        </a>
    </div>
</div>

<style>
    .cms_manager #title {
        text-align: center;
        margin-bottom: 100px;
    }
    .cms_manager {
        margin-bottom: 100px;
    }
    .cms_manager .item {
        text-align: center;
    }
    .cms_manager .item .box_outer {
        width: 50%;
        margin: 0 auto;
    }
    .cms_manager .item .box:hover {
        box-shadow: 0 0 20px #ccc;
    }
    .cms_manager .item .box #logo {}
    .cms_manager .item .box #logo i {
        font-size: 6.0em;
        color: brown;
        margin-bottom: 20px;
    }
    .cms_manager .item .box #category {}
</style>
