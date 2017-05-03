<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 03/03/2017
 * Time: 11:41 CH
 */
namespace backend_teacher\components;

use backend\models\Admin;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BackendController extends Controller
{
    public $teacher;
    public function beforeAction($action)
    {
        $user = Yii::$app->user->identity;
        if (empty($user)) {
            throw new ForbiddenHttpException('Sorry, you don\'t have permission to access [directory] on this server.');
        }
        $this->teacher = $user;
        return true;
    }
}