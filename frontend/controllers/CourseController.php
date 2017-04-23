<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:43 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\ClassLevel;
use frontend\models\Course;
use frontend\models\FreeLessonOnCourse;
use frontend\models\Student;
use frontend\models\StudentCourse;
use frontend\models\Subject;
use frontend\models\User;
use yii\data\Pagination;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class CourseController extends Controller
{
    /**
     * Danh sách khóa học
     * @return string
     */
    public function actionListCourse()
    {
        return $this->render('list_course');
    }

    /**
     * Tìm kiêm khóa học
     * @return string
     */
    public function actionSearchCourse()
    {
        $request = Yii::$app->request->get();
        $class_id = isset($request['class_id']) ? $request['class_id'] : '';
        $subject_id = isset($request['subject_id']) ? $request['subject_id'] : '';

        $search = Course::search_course([
            'subject_id' => $subject_id,
            'class_id' => $class_id
        ]);
        $list_course = $search['results'];
        $pagination = $search['pagination'];

        $class_name = ClassLevel::getAttributeValue(['class_level_id' => $class_id], 'class_level_name');
        $subject_name = Subject::getAttributeValue(['subject_id' => $subject_id], 'subject_name');

        return $this->render('search_course', [
            'courses' => $list_course,
            'class_name' => $class_name,
            'subject_name' => $subject_name,
            'pagination' => $pagination
        ]);
    }

    /**
     * Giói thiệu chi tiết khóa học
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail($id)
    {
        $id = Utility::encrypt_decrypt('decrypt', $id);
        $ex = explode('_', $id);
        if (!isset($ex[1]) || (!is_numeric($ex[1]))) {
            throw new NotFoundHttpException('Không tìm thấy trang này.');
        }
        $course_id = $ex[1];
        $course = Course::findOne(['course_id' => $course_id]);
        if (empty($course)) {
            throw new NotFoundHttpException('Không tìm thấy trang này.');
        }
        return $this->render('course_detail', [
            'course' => $course
        ]);
    }

    /**
     * Đăng ký khóa học
     */
    public function actionSignedToCourse()
    {
        if (!Yii::$app->request->isAjax || !Yii::$app->request->isPost) {
            echo json_encode(['status' => 0, 'message' => 'Error']);
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();

        // check khóa học tồn tại
        $course_id = isset($request['course_id']) ? $request['course_id'] : '';
        $course = Course::get_course_active($course_id);
        if (empty($course)) {
            echo json_encode(['status' => 0, 'message' => 'Error! Khóa học không tồn tại']);
            Yii::$app->end();
        }

        // check user đăng nhập
        $user = Yii::$app->user->identity;
        if (empty($user)) {
            echo json_encode(['status' => 0, 'message' => "Bạn không có quyền truy cập. Hãy <a href='" . Url::toRoute(['/site/login']) . "' target='_blank'> đăng nhập</a>"]);
            Yii::$app->end();
        }
        if ($user->type != 1) {
            echo json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không có quyền truy cập']);
            Yii::$app->end();
        }

        // check số dư tài khoản
        $std = Student::findOne(['std_id' => $user->student_id]);
        if (empty($std)) {
            echo json_encode(['status' => 0, 'message' => 'Tài khoản không tồn tại.']);
            Yii::$app->end();
        }
        if ($std->std_balance < $course['price']) {
            echo json_encode(['status' => 0, 'message' => "Tài khoản của bạn không đủ để thanh toán. Vui lòng  <a href='" . Url::toRoute(['/account/charging']) . "' target='_blank'> nạp tiền</a> vào tài khoản."]);
            Yii::$app->end();
        }

        $charge = Student::charge_money($std->std_id, -($course['price']));
        if (!$charge) {
            echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra khi trừ tiền. Vui lòng thử lại sau.']);
            Yii::$app->end();
        } else {
            $obj = new StudentCourse();
            $obj->course_id = $course_id;
            $obj->course_name = $course->course_name;
            $obj->student_id = $std->std_id;
            $obj->student_name = $std->std_full_name;
            $obj->student_signed_date = date('Y-m-d H:i:s');

            $obj->save();

            echo json_encode(['status' => 1, 'message' => 'Bạn đã đăng ký thành công khóa học. Hãy <a href="' . Url::toRoute(['/course/on-course', 'id' => Utility::encrypt_decrypt('encrypt', $course_id)]) . '" target="_blank">truy cập</a> khóa học ngay để trải nghiệm!']);
            Yii::$app->end();
        }

    }

    /**
     *
     * @param $course_id
     */
    public function actionCheckFreeLesson($course_id)
    {
        $user = Yii::$app->user->identity;
        if (empty($user)) {
            echo json_encode(['status' => 0, 'message' => "Bạn không có quyền truy cập. Hãy <a href='" . Url::toRoute(['/site/login']) . "' target='_blank'> đăng nhập</a>"]);
            Yii::$app->end();
        }
        if ($user->type != 1) {
            echo json_encode(['status' => 0, 'message' => 'Tài khoản của bạn không có quyền truy cập']);
            Yii::$app->end();
        }
        $check = FreeLessonOnCourse::findOne([
            'course_id' => $course_id,
            'student_id' => $user->student_id
        ]);
        if ((empty($check)) || (!empty($check) && $check->number_lesson < 2)) {
            echo json_encode(['status' => 1, 'message' => 'OK']);
            Yii::$app->end();
        } else {
            echo json_encode(['status' => 0, 'message' => 'Bạn đã học đủ 2 buổi miễn phí. Hãy đăng ký vào khóa học để học tiếp']);
            Yii::$app->end();
        }
    }

    public function actionOnCourse($id)
    {
        $enc = Utility::encrypt_decrypt('decrypt', $id);
        $ex = explode('_', $enc);
        if (!isset($ex[1]) || !is_numeric($ex[1])) {
            throw new NotFoundHttpException("Bạn không có quyền truy cập");
        }
        $course_id = $ex[1];
        $course = Course::findOne(['course_id' => $course_id]);
        $check = $this->check_permission($course);
        if (!$check) {
            throw new NotFoundHttpException("Bạn không có quyền truy cập");
        }

        return $this->render('on_course', [
            'course' => $course
        ]);
    }

    private function check_permission(Course $course)
    {
        $user = Yii::$app->user->identity;
        if (empty($user)) {
            return false;
        }
        $check = false;

        if ($user->type == 1) {             // học sinh
            // check xem miễn phí 2 video (hoặc 2 buổi học)
            // check xem học sinh xem hết 2 video miên phí + có đăng ký hay không
            $freeLesson = FreeLessonOnCourse::findOne(['course_id' => $course->course_id, 'student_id' => $user->student_id]);
            $std_course = StudentCourse::findOne(['course_id' => $course->course_id, 'student_id' => $user->student_id]);
            if (empty($freeLesson) || (intval($freeLesson->number_lesson) < 2) || (!empty($std_course))) {
                $check = true;
            }

        } else if ($user->type == 2) {          // giáo viên
            // nếu lớp học là miễn phí + public hoặc là lớp của giáo viên mở
            if (($course->price == 0 && $course->privacy == 1) || ($course->teacher_id == $user->teacher_id)) {
                $check =  true;
            }
        }
        return $check;
    }
}