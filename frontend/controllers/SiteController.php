<?php
namespace frontend\controllers;

use frontend\models\Student;
use frontend\models\Teacher;
use frontend\models\User;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
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

    /**
     * Pagr intro about site
     * @return string
     */
    public function actionIntro()
    {
        return $this->render('intro');
    }

    /**
     * Sign up
     * @param null $type
     * @return string|\yii\web\Response
     */
    public function actionSignup($type = null)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }

        $model = new Student();
        if ($type != 'teacher') {
            $model = new Student();
            $model->scenario = 'create';
        }
        if ($type == 'teacher') {
            $model = new Teacher();
        }

        if ($model->load(Yii::$app->request->post()) && $model->signup($model)) {
            return $this->redirect(Url::toRoute(['/account/login', 'type' => ($type == 'teacher' ? 'teacher' : 'student')]));
        }
        return $this->render('signup', [
            'model' => $model,
            'type' => $type
        ]);
    }

    /**
     * Login
     * @param string $type
     * @return string|\yii\web\Response
     */
    public function actionLogin($type = '')
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }
        $model = new User();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login($type)) {
            if ($model->type == 1) {
                return $this->redirect(Url::toRoute(['/site']));
            } else {
                return $this->redirect(Url::toRoute(['/account/info']));
            }
        }
        return $this->render('login', [
            'model' => $model,
            'type' => $type
        ]);
    }

    /**
     * Logout
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionError()
    {
        return $this->render('error', [
            'name' => '',
            'message' => '',
        ]);
    }
}
