<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 03/03/2017
 * Time: 11:42 CH
 */
namespace backend\controllers;

use Yii;
use yii\base\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        echo "This is page login";
//        return $this->render('login');
    }

    public function actionLogout()
    {

    }
}