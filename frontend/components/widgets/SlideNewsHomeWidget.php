<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 04/03/2017
 * Time: 10:26 CH
 */
namespace frontend\components\widgets;

use frontend\components\WidgetBase;
use Yii;

class SlideNewsHomeWidget extends WidgetBase
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
            'list_slides' => $this->arr_items,
        ]);
    }
}