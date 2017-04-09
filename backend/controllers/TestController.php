<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 09/04/2017
 * Time: 9:38 SA
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $ftp_server = Yii::$app->params['ftp']['ftp_server'];
        $ftp_user_name = Yii::$app->params['ftp']['ftp_user_name'];
        $ftp_user_pass = Yii::$app->params['ftp']['ftp_user_pass'];

        $conn_id = ftp_connect($ftp_server);

        // login with username and password
        ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        var_dump(ftp_mkdir($conn_id, 'admin'));
    }
}