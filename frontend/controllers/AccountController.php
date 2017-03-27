<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:39 SA
 */
namespace frontend\controllers;

use frontend\components\FrontendController;
use frontend\models\Student;
use frontend\models\Teacher;
use kartik\helpers\Html;
use Yii;

class AccountController extends FrontendController
{
    public function actionCreateAccount($type = null)
    {
        $this->layout = 'main_2';
        $model = new Student();
        if ($type != 'teacher') {
            $model = new Student();
        }
        if ($type == 'teacher') {
            $model = new Teacher();
        }
        return $this->render('create_account', [
            'model' => $model,
            'type' => $type
        ]);
    }

    public function actionLogin($type = null)
    {
        $this->layout = 'main_2';
        $model = new Student();
        if ($type != 'teacher') {
            $model = new Student();
        }
        if ($type == 'teacher') {
            $model = new Teacher();
        }

        if ($model->load(Yii::$app->request->post())) {
//            $this->redirect('/');
            var_dump($model->std_username);
            var_dump(Yii::$app->security->generatePasswordHash($model->std_password));die();
        } else {
            return $this->render('login', [
                'model' => $model,
                'type' => $type
            ]);
        }
    }
}