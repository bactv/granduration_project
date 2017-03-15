<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 03/03/2017
 * Time: 11:41 CH
 */
namespace backend\components;

use backend\models\Admin;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BackendController extends Controller
{
    public function beforeAction($action)
    {
//        $user_id = Yii::$app->user->id;
//        $controller_name = ucfirst(Yii::$app->controller->id);
//        $action_name = ucfirst(Yii::$app->controller->action->id);
//
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(Yii::$app->urlManager->createUrl(['default/login']));
//        } else if (CheckPermission::checkPermission($user_id, $controller_name, $action_name)) {
//            $model = Admin::findIdentity($user_id);
//            $model['ad_last_active_time'] = date('Y-m-d H:i:s');
//            $model->save();
//            return true;
//        } else {
//            throw new ForbiddenHttpException('Sorry, you don\'t have permission to access [directory] on this server.');
//        }
        return true;
    }
}