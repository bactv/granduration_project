<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/05/2017
 * Time: 11:55 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\Course;
use frontend\models\LessonCourse;
use frontend\models\Teacher;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class CmsCourseManagerController extends Controller
{
    protected $course_id;
    protected $course;

    public function actions()
    {
        $teacher_id = isset(Yii::$app->user->identity->teacher_id) ? Yii::$app->user->identity->teacher_id : '';

        if ($teacher_id == '') {
            throw new ForbiddenHttpException("Bạn không có quyền truy cập trang này.");
        }
        $id = isset($_REQUEST['course_id']) ? $_REQUEST['course_id'] : '';
        $enc = Utility::encrypt_decrypt('decrypt', $id);
        $ex = explode('_', $enc);
        if (!isset($ex[1]) || !is_numeric($ex[1])) {
            throw new NotFoundHttpException("Bạn không có quyền truy cập");
        }
        $course_id = $ex[1];
        $course = Course::get_course_active($course_id);
        if (empty($course)) {
            throw new NotFoundHttpException("Trang bạn yêu cầu không tìm thấy.");
        }
        $this->course_id = $course_id;
        $this->course = $course;
    }

    public function actionIndex()
    {
        $course = $this->course;
        $lessons = LessonCourse::findAll(['course_id' => $course['course_id']]);
        if ($course['course_type_id'] == 1) {
            return $this->render('video/index', [
                'course' => $course,
                'lessons' => $lessons,
            ]);
        } else if ($course['course_type_id'] == 2) {
            return $this->render('live_stream/index', [
                'course' => $course,
                'lessons' => $lessons,
            ]);
        }
    }

    public function actionLessonInfo()
    {
        $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : '';
        $course_type_id = isset($_GET['course_type_id']) ? $_GET['course_type_id'] : '';
        $lesson = LessonCourse::findOne(['id' => $lesson_id]);

        if ($course_type_id == 1) {
            return $this->renderAjax('video/lesson_info', [
                'lesson' => $lesson,
            ]);
        } else if ($course_type_id == 2) {
            return $this->renderAjax('live_stream/lesson_info', [
                'lesson' => $lesson,
            ]);
        }
    }
}