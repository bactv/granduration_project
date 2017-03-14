<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use kartik\icons\Icon;

Icon::map($this, Icon::FA);

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Create {modelClass}', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = <?= $generator->generateString('Create') ?>;
$this->params['menu'] = [
    ['label'=>Icon::show('reply') . " " .<?= $generator->generateString('Back') ?>, 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
    <?= "<?= " ?>$this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

