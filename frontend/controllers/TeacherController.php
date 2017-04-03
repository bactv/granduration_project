<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/04/2017
 * Time: 10:02 SA
 */
namespace frontend\controllers;

use frontend\components\FrontendController;

class TeacherController extends FrontendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail()
    {
        return $this->render('detail');
    }
}