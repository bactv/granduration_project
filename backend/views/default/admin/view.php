<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;
use common\components\Utility;
use backend\models\Admin;
use common\components\AssetApp;
use backend\models\AdminGroup;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->ad_username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->ad_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->ad_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('cms', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ad_id',
            'ad_username',
            'ad_full_name',
            'ad_email',
            'ad_profession',
            [
                'attribute' => 'ad_birthday',
                'value' => Utility::formatDataTime($model['ad_birthday'], '-', '/', false),
            ],
            [
                'attribute' => 'ad_avatar',
                'format' => ['image',['width'=>'70','height'=>'70']],
                'value' => function ($model) {
                    if ($model['ad_avatar'] == 1) {
                        return Yii::$app->params['storage_url'] . Yii::$app->params['img_url']['avatar_admin']['folder'] . '/' . $model['ad_id'] . '.png';
                    } else {
                        return AssetApp::getImageBaseUrl() . '/avatar_icon_backend_3.png';
                    }
                }
            ],
            [
                'attribute' => 'ad_status',
                'value' => ($model['ad_status'] == 1) ? 'Active' : 'Deactive'
            ],
            [
                'attribute' => 'ad_last_active_time',
                'label' => Yii::t('cms','Last active time' ),
                'value' => Utility::formatDataTime($model['ad_last_active_time'], '-', '/', true),
            ],
            [
                'attribute' => 'ad_created_by',
                'label' => Yii::t('cms','Created By' ),
                'value' => Admin::getAttributeValue(['ad_id' => $model['ad_created_by']], 'ad_username')
            ],
            [
                'attribute' => 'ad_updated_by',
                'label' => Yii::t('cms','Updated By' ),
                'value' => Admin::getAttributeValue(['ad_id' => $model['ad_updated_by']], 'ad_username')
            ],
            [
                'attribute' => 'ad_created_time',
                'label' => Yii::t('cms','Created Time' ),
                'value' => Utility::formatDataTime($model['ad_created_time'], '-', '/', true),
            ],
            [
                'attribute' => 'ad_updated_time',
                'label' => Yii::t('cms','Updated Time' ),
                'value' => Utility::formatDataTime($model['ad_updated_time'], '-', '/', true),
            ],
            [
                'attribute' => 'ad_group_ids',
                'label' => Yii::t('cms','Admin Groups' ),
                'format' => ['html'],
                'value' => function ($model) {
                    $str_ids = ($model['ad_group_ids'] != '') ? json_decode($model['ad_group_ids']) : [];
                    $str = '';
                    foreach ($str_ids as $gr_id) {
                        $str .= '<p>' . AdminGroup::getAttributeValue(['ad_group_id' => $gr_id], 'ad_group_name') . '</p>';
                    }
                    return $str;
                }
            ],
        ],
    ]) ?>

</div>
