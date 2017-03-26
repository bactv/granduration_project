<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 9:07 SA
 */
namespace frontend\components\widgets;

use frontend\components\WidgetBase;
use Yii;

class ListCourseWidget extends WidgetBase
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
        ]);
    }
}
