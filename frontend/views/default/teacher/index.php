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
use frontend\models\ClassLevel;
use frontend\models\Subject;
use yii\helpers\ArrayHelper;
use frontend\models\Degree;
use frontend\models\Teacher;
use common\components\Utility;

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
        height: 180px;
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
        position: absolute;
        bottom: 0;
        right: 10px;
        font-size: 12px;
    }

</style>

<div class="row search_teacher">
    <div class="col-md-3">
        <?php echo Html::dropDownList('class', '', ArrayHelper::map(ClassLevel::find()->all(), 'class_level_id', 'class_level_name'), [
            'class' => 'form-control',
            'style' => 'width: 90%;',
            'id' => 'class_id'
        ]) ?>
    </div>
    <div class="col-md-3">
        <?php echo Html::dropDownList('subject', '', ArrayHelper::map(Subject::find()->all(), 'subject_id', 'subject_name'), [
            'class' => 'form-control',
            'style' => 'width: 90%;',
            'id' => 'subject_id'
        ]) ?>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-success" onclick="search_teacher()"><?php echo Icon::show('search') ?> Tìm kiếm</button>
    </div>
</div>

<?php if (isset($lists) && count($lists) > 0) { ?>
<div class="row list_teacher">
    <?php foreach ($lists as $teacher) {
        $img = Utility::get_content_static(Yii::$app->params['img_url']['avatar_teacher']['folder'] .
            '/', $teacher['tch_id']);
        if ($img == null) {
            $img = AssetApp::getImageBaseUrl() . '/avatar/Phan_huy_khai_2.JPG';
        }
        ?>
        <div class="col-md-4 item">
            <div class="avatar">
                <a href="<?php echo Url::toRoute(['/teacher/detail', 'id' => $teacher['tch_id']]) ?>"><img src="<?php echo $img ?>"></a>
            </div>
            <div class="tch_info">
                <p id="tch_name"><?php echo Degree::getAttributeValue($teacher['tch_degree'], 'abb_name') . ': ' . $teacher['tch_full_name'] ?></p>
                <p id="tch_work_place"><?php echo $teacher['tch_work_place'] ?></p>
                <p id="tch_intro"><?php echo Utility::truncateStringWords($teacher['tch_work_place'], 70) ?></p>
                <p id="tch_detail"><a href="<?php echo Url::toRoute(['/teacher/detail', 'id' => $teacher['tch_id']]) ?>">Chi tiết >> </a></p>
            </div>
        </div>
    <?php } ?>
</div>
<?php }else { ?>
    <p>Không có giáo viên nào</p>
<?php } ?>