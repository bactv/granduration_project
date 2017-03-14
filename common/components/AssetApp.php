<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 1:48 SA
 */
namespace common\components;

use Yii;
use yii\base\Component;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;

class AssetApp extends Component
{
    /**
     * @return string
     * Get theme base url
     */
    public static function getThemeBaseUrl()
    {
        return Yii::$app->view->theme->baseUrl;
    }
    /**
     * @return string
     * Get theme base images
     */
    public static function getImageBaseUrl()
    {
        return Yii::$app->view->theme->baseUrl.'/images';
    }
    /**
     * @param bool $fileName
     * Register css file for system
     */
    public static function regCssFile($fileName)
    {
        return Yii::$app->view->registerCssFile(self::getThemeBaseUrl().'/css/'.$fileName, ['depends' => BootstrapAsset::className()]);
    }
    /**
     * @param $fileName
     * @param $pluginName
     * Register css file plugin for system
     */
    public static function regCssFilePlugin($fileName, $pluginName)
    {
        return Yii::$app->view->registerCssFile(self::getThemeBaseUrl().'/plugins/'.$pluginName.'/'.$fileName, ['depends' => BootstrapAsset::className()]);
    }
    /**
     * @param bool $fileName
     * Register js file for system
     */
    public static function regJsFile($fileName,$posEnd=false)
    {
        if($posEnd){
            return Yii::$app->view->registerJsFile(self::getThemeBaseUrl() . '/js/' . $fileName, ['depends' => JqueryAsset::className()]);
        }else {
            return Yii::$app->view->registerJsFile(self::getThemeBaseUrl() . '/js/' . $fileName, ['depends' => JqueryAsset::className(), 'position' => \yii\web\View::POS_HEAD]);
        }
    }
    /**
     * @param $fileName
     * @param $pluginName
     * Register js file plugin for system
     */
    public static function regJsFilePlugin($fileName, $pluginName,$posEnd=false)
    {
        if($posEnd){
            return Yii::$app->view->registerJsFile(self::getThemeBaseUrl().'/plugins/'.$pluginName.'/'.$fileName, ['depends' => JqueryAsset::className()]);
        }else{
            return Yii::$app->view->registerJsFile(self::getThemeBaseUrl().'/plugins/'.$pluginName.'/'.$fileName, ['depends' => JqueryAsset::className(),'position' => \yii\web\View::POS_HEAD]);
        }
    }
    /**
     * @param $key
     * @return mixed
     * Get key in params
     */
    public static function getParams($key)
    {
        return Yii::$app->params[$key];
    }
    /**
     * @param $key1
     * @param $key2
     * @return mixed
     * Get key in params array
     */
    public static function getParamsArray($key1, $key2)
    {
        return Yii::$app->params[$key1][$key2];
    }
    /**
     * @param $themeName
     * Set theme for system
     */
    public static function setTheme($themeName)
    {
        Yii::$app->view->theme->baseUrl = rtrim(Yii::getAlias('@web/themes/'.$themeName), '/');
        Yii::$app->view->theme->basePath = Yii::getAlias('@themes/'.$themeName);
        Yii::$app->view->theme->pathMap['@app/views'] = ['@themes/'.$themeName.'/views'];
    }
    /**
     * @param $array
     * @param bool $dump
     * Debug a var or function
     */
    public static function debug($array, $dump = false)
    {
        echo '<pre>';
        if ($dump) {
            var_dump($array);
        } else {
            print_r($array);
        }
        echo '</pre>';
        exit();
    }
}