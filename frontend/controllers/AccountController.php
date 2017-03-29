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
use frontend\models\User;
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

    /**
     * cần mã hóa user_id
     * @return string
     */
    public function actionInfo()
    {
        $this->layout = 'main_2';
        $object = User::findOne(['id' => Yii::$app->user->identity->id]);
        if ($object['type'] == 1) {
            $model = Student::findOne(['std_id' => $object['id']]);
            return $this->render('student_info', ['model' => $model]);
        } else {
            $model = Teacher::findOne(['tch_id' => $object['id']]);
            return $this->render('teacher_info', ['model' => $model]);
        }
    }

    public function actionDetailInfo()
    {
        $object = User::findOne(['id' => Yii::$app->user->identity->id]);
        if ($object['type'] == 1) {
            $model = Student::findOne(['std_id' => $object['id']]);
            return $this->renderAjax('detail_student_info', ['model' => $model]);
        } else {
            $model = Teacher::findOne(['tch_id' => $object['id']]);
            return $this->renderAjax('detail_teacher_info', ['model' => $model]);
        }
    }

    public function actionHistoryTransactionInfo()
    {
        $user_id = Yii::$app->user->identity->id;
        $object = $this->getObject($user_id);
        if ($object instanceof Student) {
            $history_charging = [];
            $history_transaction = [];
            return $this->renderAjax('history_transaction_info', [
                'model' => $object,
                'history_charging' => $history_charging,
                'history_transaction' => $history_transaction
            ]);
        }
        return '';
    }

    private function getObject($object_id)
    {
        $object = User::findOne(['id' => $object_id]);
        if ($object['type'] == 1) {
            $model = Student::findOne(['std_id' => $object['id']]);
        } else {
            $model = Teacher::findOne(['tch_id' => $object['id']]);
        }
        return $model;
    }
}