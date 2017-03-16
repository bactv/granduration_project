<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model backend\models\Agreement */

$this->title = $model->agreement_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Agreements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#view-agreement" onclick="view_agreement(<?php echo $model->agreement_id ?>)">Chi tiết HĐ</a></li>
    <li><a data-toggle="tab" href="#agreement-addendum" onclick="agreement_addendum(<?php echo $model->agreement_id ?>)">Phụ lục HĐ</a></li>
</ul>

<div class="tab-content" style="padding-top: 20px">
    <div id="view-agreement" class="tab-pane fade in active">
        <?php echo $this->render('view-agreement', ['model' => $model]) ?>
    </div>
    <div id="agreement-addendum" class="tab-pane fade">
    </div>
</div>
