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

<div id="owl-demo" class="owl-carousel owl-theme">
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/002.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/003.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/004.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/005.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/006.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/007.jpg' ?>">
    </div>
    <div class="item">
        <img src="<?php echo AssetApp::getImageBaseUrl() . '/slide_2/008.jpg' ?>">
    </div>
</div>

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
