<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 10:39 SA
 */
namespace frontend\controllers;

use backend\models\Package;
use common\components\Utility;
use frontend\components\FrontendController;
use frontend\models\Course;
use frontend\models\FeedbackToTeacher;
use frontend\models\FreeLessonOnCourse;
use frontend\models\Student;
use frontend\models\StudentCourse;
use frontend\models\StudentPackage;
use frontend\models\Teacher;
use frontend\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use yii\web\UploadedFile;

class AccountController extends FrontendController
{
    protected $model;

    public function init()
    {
        $this->model = $this->getObject();
    }

    public function actions()
    {
        if (empty($this->model)) {
            throw new NotFoundHttpException("Trang bạn tìm kiếm không tồn tại");
        }
    }

    /**
     * cần mã hóa user_id
     * @return string
     */
    public function actionInfo()
    {
        if ($this->model instanceof Student) {
            $this->model->std_birthday = Utility::formatDataTime($this->model->std_birthday, '-', '/', false);
            return $this->render('student/student_info', ['model' => $this->model]);
        } else {
            return $this->render('teacher/teacher_info', ['model' => $this->model]);
        }
    }

    public function actionDetailInfo()
    {
        $model = $this->model;
        if ($model instanceof Student) {
            $model->std_birthday = Utility::formatDataTime($model->std_birthday, '-', '/', false);
            return $this->renderAjax('student/detail_student_info', ['model' => $model]);
        } else {
            return $this->renderAjax('teacher/detail_teacher_info', ['model' => $model]);
        }
    }

    public function actionHistoryTransactionInfo()
    {
        $object = $this->model;
        if ($object instanceof Student) {
            $history_charging = [];
            $history_transaction = [];
            return $this->renderAjax('student/history_transaction_info', [
                'model' => $object,
                'history_charging' => $history_charging,
                'history_transaction' => $history_transaction
            ]);
        }
        return '';
    }

    public function actionUserPackage()
    {
        $object = $this->model;
        if ($object instanceof Student) {
            $packages = Package::findAll(['pk_status' => 1, 'pk_deleted' => 0]);
            $user_package = StudentPackage::find()->where(['student_id' => $object->std_id])->andWhere('expire_date >= "' . date('Y-m-d H:i:s') . '"')->all();
            return $this->renderAjax('student/user_package', [
                'model' => $object,
                'packages' => $packages,
                'user_package' => $user_package
            ]);
        }
        return '';
    }

    public function actionRegisterPackage()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            echo json_encode(['status' => -1, 'message' => 'Có lỗi xảy ra 1']);
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();
        $student_id = isset($request['student_id']) ? $request['student_id'] : '';
        $package_id = isset($request['package_id']) ? $request['package_id'] : '';

        $student = Student::findOne(['std_id' => $student_id]);
        $package = Package::findOne(['pk_id' => $package_id]);

        if (empty($student) || empty($package)) {
            echo json_encode(['status' => -1, 'message' => 'Có lỗi xảy ra 2']);
            Yii::$app->end();
        }

        // kiểm tra gói cước học sinh đã đăng ký trước đó và vẫn còn hạn hay chưa
        if (StudentPackage::check_package_active_student($student_id, $package_id)) {
            echo json_encode(['status' => 0, 'message' => 'Bạn vẫn đang sử dụng gói cước này.']);
            Yii::$app->end();
        }

        // kiểm tra tài khoản học sinh
        if ($student['std_balance'] < $package['pk_price']) {
            echo json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không đủ để thực hiện đăng ký gói cước này. Hãy nạp thêm tiền vào tài khoản']);
            Yii::$app->end();
        } else {
            $check = StudentPackage::register_package($student, $package);
            if ($check) {
                $obj = StudentPackage::find()->where(['student_id' => $student_id, 'package_id' => $package_id])->andWhere('expire_date >= "' . date('Y-m-d H:i:s') . '"')->one();
                echo json_encode(['status' => 1, 'message' => 'Bạn đã đăng ký thành công gói ' . $package->pk_code . '. Hạn sử dụng: ' . Utility::formatDataTime($obj['expire_date'], '-', '/', true)]);
                Yii::$app->end();
            }
        }


    }

    public function actionCharging()
    {
        $model = $this->model;
        if ($model instanceof Student) {
            return $this->render('student/charging');
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
        $model = $this->model;
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

    public function actionGetCourseTeacher()
    {
        if ($this->model instanceof Teacher) {
            $list_course = Course::list_course_by_teacher($this->model->tch_id);
            return $this->renderAjax('teacher/teacher_list_course', [
                'list_course' => $list_course
            ]);
        }
        return '';
    }

    public function actionCreateCourse()
    {
        $object = $this->model;
        if ($object instanceof Teacher) {
            $model = new Course();

            $request = Yii::$app->request->post();

            if ($model->load($request)) {
                $model->video_intro = UploadedFile::getInstance($model, 'video_intro');
                $model->lecture_note = UploadedFile::getInstance($model, 'lecture_note');

                $model->teacher_id = $object->tch_id;
                $model->created_time = date('Y-m-d H:i:s');
                $model->updated_time = date('Y-m-d H:i:s');
                $model->created_by = $object->tch_id;
                $model->updated_by = $object->tch_id;
                $model->signed_to_date = Utility::formatDataTime($model->signed_to_date, '/', '-');
                $model->start_date = Utility::formatDataTime($model->start_date, '/', '-');
                $model->end_date = Utility::formatDataTime($model->end_date, '/', '-');

                if ($model->save() && $model->upload_file('video_intro', $object->tch_id, $model->course_id, 'video_intro')
                    && $model->upload_file('lecture_note', $object->tch_id, $model->course_id, 'lecture_note')) {
                    Yii::$app->session->setFlash('success', 'Bạn đã tạo thành công khóa học. Hệ thống sẽ xem xét và trả lời bạn trong thời gian sớm nhất.');
                    return $this->redirect(Url::toRoute(['account/info']));
                } else {
                    Yii::$app->session->setFlash('error', 'Có lỗi xảy ra. Vui lòng kiểm tra lại các thông tin đã nhập.');
                    return $this->render('teacher/create_course', [
                        'object' => $object,
                        'model' => $model
                    ]);
                }
            }
            return $this->render('teacher/create_course', [
                'object' => $object,
                'model' => $model
            ]);
        }
        return '';
    }

    public function actionUpdateNotification()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();
        $feed_id = isset($request['feed_id']) ? $request['feed_id'] : '';
        if ($feed_id == '') {
            Yii::$app->end();
        }
        $model = FeedbackToTeacher::findOne(['id' => $feed_id]);
        $model->status_view = 1;
        $model->save();
        Yii::$app->end();
    }

    public function actionListCourseStudent()
    {
        $user = Yii::$app->user->identity;
        if (empty($user) || ($user->type == 2)) {
            Yii::$app->end();
        }
        $student_id = $user->student_id;
        $arr_results_signed = [];
        $arr_results_not_signed = [];

        // lấy danh sách khóa học đã đăng ký
        $data = StudentCourse::find()->where(['student_id' => $student_id])->orderBy('student_signed_date DESC')->asArray()->all();
        foreach ($data as $dt) {
            $arr_results_signed[$dt['course_id']] = [
                'course_id' => $dt['course_id'],
                'signed_date' => $dt['student_signed_date']
            ];
        }
        // lấy danh sách khóa học đã học thử
        $data = FreeLessonOnCourse::find()->where(['student_id' => $student_id])->orderBy('course_id DESC')->asArray()->all();
        foreach ($data as $dt) {
            if (!isset($arr_results_signed[$dt['course_id']])) {
                $arr_results_not_signed[$dt['course_id']] = [
                    'course_id' => $dt['course_id'],
                ];
            }
        }
        return $this->renderAjax('student/list_course', [
            'arr_results_signed' => $arr_results_signed,
            'arr_results_not_signed' => $arr_results_not_signed
        ]);
    }

    public function actionChangeAvatar()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            Yii::$app->end();
        }
        $model = $this->getObject();
        if ($model instanceof Teacher) {

        }
    }

    private function getObject()
    {
        $object = Yii::$app->user->identity;
        if (empty($object)) {
            return null;
        }
        if ($object['type'] == 1) {
            $model = Student::findOne(['std_id' => $object['student_id']]);
        } else {
            $model = Teacher::findOne(['tch_id' => $object['teacher_id']]);
        }
        return $model;
    }
}