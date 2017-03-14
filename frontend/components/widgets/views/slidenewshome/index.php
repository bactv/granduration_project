<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 10:27 CH
 */

use common\components\AssetApp;

AssetApp::regJsFilePlugin('jssor.slider-22.2.11.mini.js', 'jssor_slider');

?>
<div id="slider1_container">
    <!-- Slides Container -->
    <div class="slides" data-u="slides">
        <div><a href=""><img data-u="image" src="<?php echo AssetApp::getImageBaseUrl() . DIRECTORY_SEPARATOR . 'slide_1' . DIRECTORY_SEPARATOR . '077.png' ?>" /></a></div>
        <div><a href=""><img data-u="image" src="<?php echo AssetApp::getImageBaseUrl() . DIRECTORY_SEPARATOR . 'slide_1' . DIRECTORY_SEPARATOR . '04.jpg' ?>" /></a></div>
        <div><a href=""><img data-u="image" src="<?php echo AssetApp::getImageBaseUrl() . DIRECTORY_SEPARATOR . 'slide_1' . DIRECTORY_SEPARATOR . '05.jpg' ?>" /></a></div>
        <div><a href=""><img data-u="image" src="<?php echo AssetApp::getImageBaseUrl() . DIRECTORY_SEPARATOR . 'slide_1' . DIRECTORY_SEPARATOR . '09.jpg' ?>" /></a></div>
    </div>
    !-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora12l" data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora12r" data-autocenter="2"></span>

</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideshowTransitions = [
            {$Duration:1200,$Opacity:2}
        ];

        var jssor_1_options = {
            $AutoPlay: true,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("slider1_container", jssor_1_options);
    });
</script>

