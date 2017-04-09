<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        return $this->render('index');
    }

    public function actionIntro()
    {
        return $this->render('intro');
    }
}
