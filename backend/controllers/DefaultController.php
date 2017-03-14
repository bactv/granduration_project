<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 03/03/2017
 * Time: 11:42 CH
 */
namespace backend\controllers;

use backend\models\LoginForm;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

    /**
     * Index
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['default/login']);
        }
        return $this->render('index');
    }

    /**
     * Login
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest)
            return $this->goHome();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

    /**
     * Logout
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}