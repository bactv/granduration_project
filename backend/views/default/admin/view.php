<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->ad_id;
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
            'ad_password',
            'ad_full_name',
            'ad_email',
            'ad_profession',
            'ad_birthday',
            'ad_avatar',
            'ad_status',
            'ad_last_active_time',
            'ad_created_by',
            'ad_updated_by',
            'ad_created_time',
            'ad_updated_time',
            'ad_group_ids',
        ],
    ]) ?>

</div>
