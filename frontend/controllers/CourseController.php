<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:43 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\Course;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class CourseController extends Controller
{
    public function actionListCourse()
    {
        return $this->render('list_course');
    }

    public function actionSearchCourse()
    {
        return $this->render('search_course');
    }

    public function actionDetail()
    {
        return $this->render('course_detail');
    }

    public function actionOnCourse($id)
    {
        $enc = Utility::encrypt_decrypt('decrypt', $id);
        $ex = explode('_', $enc);
        if (!isset($ex[1]) || !is_numeric($ex[1])) {
            throw new NotFoundHttpException("Bạn không có quyền truy cập");
        }
        $course_id = $ex[1];
        $check = $this->check_permission($course_id);
        if (!$check) {
            throw new NotFoundHttpException("Bạn không có quyền truy cập");
        }

        return $this->render('on_course');
    }

    private function check_permission($course_id)
    {
        $user = Yii::$app->user->identity;
        $course = Course::findOne(['course_id' => $course_id]);
        $check = false;

        if ($user->type == 1) {             // học sinh
            // check xem miễn phí 2 video (hoặc 2 buổi học)

            // check xem học sinh xem hết 2 video miên phí + có đăng ký hay không

        } else if ($user->type == 2) {          // giáo viên
            // nếu lớp học là miễn phí + public hoặc là lớp của giáo viên mở
            if (($course->price == 0 && $course->privacy == 1) || ($course->teacher_id == $user->teacher_id)) {
                $check =  true;
            }
        }
        return $check;
    }
}