<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Course */

$this->title = $model->course_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1 style="margin-bottom: 10px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Icon::show('pencil-square-o') . " " .Yii::t('cms', 'Update'), ['update', 'id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Icon::show('trash-o') . " " .Yii::t('cms', 'Delete'), ['delete', 'id' => $model->course_id], [
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
            'course_id',
            'course_name',
            'course_description:ntext',
            'teacher_id',
            'party_id',
            'course_type_id',
            'price',
            'signed_to_date',
            'start_date',
            'end_date',
            'subject_id',
            'class_level_id',
            'privacy',
            'status',
            'approved',
            'approver',
            'created_time',
            'updated_time',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
