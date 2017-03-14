<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="left_col">
                <div class="side_left">
                    <?php echo $this->render('components/side_left.php') ?>
                </div>
            </div>
            <div class="right_col">
                <div class="header">
                    <?php echo $this->render('components/header.php') ?>
                </div>
                <div class="main-content">
                    <div class="row breadcrumbs_c">
                        <h2 class="title_c"><?php echo isset($this->params['title']) ? $this->params['title'] : ''; ?></h2>
                        <?php echo Breadcrumbs::widget([
                            'itemTemplate' => "<li>{link}</li>\n",
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?>
                    </div><!--Breacrumbs-->
                    <div class="row menu_c">
                        <?php
                        echo Menu::widget([
                            'options' => ['class' => 'ibox-title-ul'],
                            'encodeLabels' => false,
                            'items' => isset($this->params['menu']) ? $this->params['menu'] : []
                        ]);
                        ?>
                    </div>
                    <div class="row main_c">
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="footer">
                    <?php echo $this->render('components/footer.php') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
