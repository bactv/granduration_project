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
    public function init()
    {
//        echo "XXX";
    }

    private function logSession()
    {
//        $logSession = isset($_SESSION['logSession']) ? $_SESSION['logSession'] : 0;
//        $logSessionTime = time();
//        if ($logSessionTime > 180) {
//            $logSessionTime = 0;
//        }
    }
}