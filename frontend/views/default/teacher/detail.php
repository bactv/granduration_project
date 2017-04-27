<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 03/04/2017
 * Time: 10:42 CH
 */
use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

$this->title = $this->params['title'] = $teacher['tch_full_name'];
$this->params['breadcrumbs'] = [
    ['label' => 'Giáo viên'],
    ['label' => $this->title]
]
?>

<h1>Thông tin chi tiết giáo viên</h1>

