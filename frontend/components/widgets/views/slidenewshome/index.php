<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 10:27 CH
 */

use common\components\AssetApp;

AssetApp::regJsFilePlugin('owl.carousel.js', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.carousel.css', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.theme.css', 'owl-carousel');
AssetApp::regCssFilePlugin('owl.transitions.css', 'owl-carousel');
?>

<style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: 280px;
    }
</style>

<?php if (count($list_slides) > 0) { ?>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($list_slides as $slide) { ?>
            <div class="item">
                <a href="<?php echo $slide['url'] ?>" target="_blank">
                    <img src="<?php echo Yii::$app->params['storage_url'] . Yii::$app->params['img_url']['slideshow']['folder'] . '/' . $slide['id'] . '.png' ?>" alt="<?php echo $slide['alt'] ?>">
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 2,
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [979,1]

        });
    });
</script>
