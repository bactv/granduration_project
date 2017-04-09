<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:39 SA
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\Student;
use frontend\models\Teacher;
use frontend\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;

class AccountController extends Controller
{
    public function actionCreateAccount($type = null)
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
        return $this->render('create_account', [
            'model' => $model,
            'type' => $type
        ]);
    }

    public function actionLogin($type = '')
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }
        $model = new User();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login($type)) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
            'type' => $type
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * cần mã hóa user_id
     * @return string
     */
    public function actionInfo()
    {
        $model = $this->getObject();
        if ($model instanceof Student) {
            $model->std_birthday = Utility::formatDataTime($model->std_birthday, '-', '/', false);
            return $this->render('student_info', ['model' => $model]);
        } else {
            return $this->render('teacher_info', ['model' => $model]);
        }
    }

    public function actionDetailInfo()
    {
        $model = $this->getObject();
        if ($model instanceof Student) {
            $model->std_birthday = Utility::formatDataTime($model->std_birthday, '-', '/', false);
            return $this->render('student_info', ['model' => $model]);
        } else {
            return $this->render('teacher_info', ['model' => $model]);
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

    public function actionUserPackage()
    {
        $user_id = Yii::$app->user->identity->id;
        $object = $this->getObject($user_id);
        if ($object instanceof Student) {
            return $this->renderAjax('user_package', [
                'model' => $object,
            ]);
        }
        return '';
    }

    public function actionCharging()
    {
        $model = $this->getObject();
        if ($model instanceof Student) {
            return $this->render('charging');
        } else {
            return new NotFoundHttpException("Not Found");
        }
    }

    public function actionChargeMoney()
    {
        $request = Yii::$app->request->post();
        if (!$request) {
            Yii::$app->end();
        }
        if (isset($request['telco_type'])) {
            $telco_type = isset($request['telco_type']) ? $request['telco_type'] : '';
            $serial_number = isset($request['serial_number']) ? $request['serial_number'] : '';
            $code_number = isset($request['code_number']) ? $request['code_number'] : '';

            if ($telco_type == '' || $serial_number == '' || $code_number == '') {
                Yii::$app->end();
            }
            $params = [
                'telco_type' => $telco_type,
                'serial_number' => $serial_number,
                'code_number' => $code_number
            ];

            header('Content-type: application/json');

            $result = Utility::curlSendPost(Yii::$app->params['api']['charging'][$telco_type], $params);
            $str = json_decode($result);
            if (!empty($str) && $str->{'status'} == 4) {
                $money = $str->{'money'};
                Yii::$app->db->createCommand("UPDATE student SET std_balance = std_balance + " . intval(Utility::exchangeMoney(intval($money))) . " WHERE std_id=" . Yii::$app->user->identity->student_id)->execute();
                echo json_encode($str);
                Yii::$app->end();
            }
            echo json_encode($str);
            Yii::$app->end();
        }
    }

    public function actionTest()
    {
        header('Content-type: application/json');
        $params = [
            'telco_type' => 'viettel',
                'serial_number' => '651897541',
            'code_number' => '431102678279'
        ];
        $result = Utility::curlSendPost(Yii::$app->params['api']['charging'][$params['telco_type']], $params);
        var_dump(json_encode(json_decode($result)));
    }

    public function actionUpdateAccount()
    {
        $request = Yii::$app->request->post();
        if (!$request) {
            Yii::$app->end();
        }
        $model = $this->getObject();
        if ($model instanceof Student) {
            $user = User::findOne(['type' => 1, 'student_id' => $model['std_id']]);

            $password = isset($request['new_password']) ? $request['new_password'] : '';
            $full_name = isset($request['full_name']) ? $request['full_name'] : '';
            $phone = isset($request['phone']) ? $request['phone'] : '';
            $birthday = isset($request['birthday']) ? $request['birthday'] : '';
            $school_name = isset($request['school_name']) ? $request['school_name'] : '';

            if ($password != '') {
                $model->std_password = md5($password);
                $user->password = md5($password);
            }
            if ($full_name != '') {
                $model->std_full_name = $full_name;
            }
            if ($birthday != '') {
                $model->std_birthday = date('Y-m-d', strtotime($birthday));
            }
            $model->std_phone = $phone;
            $model->std_school_name = $school_name;

            if (!$user->save() || !$model->save()) {
                echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra.' . json_encode($user->getErrors()) . json_encode($model->getErrors())]);
                Yii::$app->end();
            } else {
                echo json_encode(['status' => 1, 'message' => 'Cập nhật thành công']);
                Yii::$app->end();
            }
        }
    }

    private function getObject()
    {
        $object = Yii::$app->user->identity;
        if (empty($object)) {
            return $this->redirect(Url::toRoute(['/account/login']));
        }
        if ($object['type'] == 1) {
            $model = Student::findOne(['std_id' => $object['student_id']]);
        } else {
            $model = Teacher::findOne(['tch_id' => $object['teacher_id']]);
        }
        return $model;
    }
}