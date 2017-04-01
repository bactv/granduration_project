<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:44 SA
 */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\widgets\Breadcrumbs;

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

    <div class="wrapper container-fluid">
        <header class="container header">
            <?php echo $this->render('components/header.php') ?>
        </header>
        <div class="container main_content">
            <?php echo Breadcrumbs::widget([
                'itemTemplate' => "<li>{link}</li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]); ?>
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