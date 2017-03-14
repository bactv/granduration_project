<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 5:50 CH
 */
namespace frontend\components\widgets;

use frontend\components\WidgetBase;
use Yii;

class NavWidget extends WidgetBase
{
    public $dir;
    public $view = 'index';
    public $arr_items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render($this->dir . DIRECTORY_SEPARATOR . $this->view, [
            'menus' => $this->arr_items,
        ]);
    }
}