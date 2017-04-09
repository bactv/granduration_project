<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:40 SA
 */
namespace frontend\components;

use frontend\models\User;
use yii\web\Controller;
use Yii;

class FrontendController extends Controller
{
    public function beforeAction($action)
    {
        if (empty(Yii::$app->user->identity)) {
            return false;
        }
        return true;
    }
}