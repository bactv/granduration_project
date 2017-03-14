<?php

namespace backend\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/default';
    public $css = [
        'css/normalize.css',
        'css/reset_bootstrap.css',
        'css/common.css',
        'css/main.css'
    ];
    public $js = [
        'js/bactv.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
