<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:39 SA
 */
namespace frontend\controllers;

use frontend\components\FrontendController;
use frontend\models\User;
use Yii;

class AccountController extends FrontendController
{
    public function actionCreateAccount()
    {
        $this->layout = 'main_2';
        $model = new User();
        return $this->render('create_account', [
            'model' => $model
        ]);
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}