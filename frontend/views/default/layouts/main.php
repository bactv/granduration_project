<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\components\AssetApp;

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

    <script src="/themes/default/js/jquery.min.js"></script>
    <script src="/themes/default/js/jquery.sticky-kit.min.js"></script>
    <?php AssetApp::regJsFile('bootstrap.min.js') ?>
    <?php AssetApp::regCssFilePlugin('dist/css/bootstrap-dialog.css', 'bootstrap3-dialog-master') ?>
    <?php AssetApp::regJsFilePlugin('dist/js/bootstrap-dialog.js', 'bootstrap3-dialog-master') ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper container-fluid">
    <header class="container header">
        <?php echo $this->render('components/header.php') ?>
    </header>
    <div class="main_content">
        <?php echo $content ?>
    </div>
    <footer class="container-fluid footer">
        <?php echo $this->render('components/footer.php') ?>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
