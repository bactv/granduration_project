<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/05/2017
 * Time: 8:26 CH
 */
namespace frontend\controllers;

use common\components\Utility;
use frontend\models\Course;
use frontend\models\FreeLessonOnCourse;
use frontend\models\LessonCourse;
use frontend\models\StudentCourse;
use Yii;
use yii\base\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class LessonController extends Controller
{
    protected $course_id;
    protected $lesson_id;

    public function actions()
    {
        $request = $_REQUEST;

        $teacher_id = isset(Yii::$app->user->identity->teacher_id) ? Yii::$app->user->identity->teacher_id : '';

        $this->course_id = isset($request['course_id']) ? Utility::encrypt_decrypt('decrypt', $request['course_id']) : '';
        $this->lesson_id = isset($request['lesson_id']) ? Utility::encrypt_decrypt('decrypt', $request['lesson_id']) : '';
        $student_id = isset(Yii::$app->user->identity->student_id) ? Yii::$app->user->identity->student_id : '';

        $ex1 = explode('_', $this->course_id);
        $ex2 = explode('_', $this->lesson_id);

        if (($student_id == '' && $teacher_id == '') || (!isset($ex1[1])) || (!isset($ex2[1]))) {
            throw new ForbiddenHttpException("Bạn không có quyền truy cập trang này.");
        }

        $this->course_id = $ex1[1];
        $this->lesson_id = $ex2[1];

        $course = Course::findOne(['course_id' => $this->course_id]);
        $lesson = LessonCourse::get_lesson($this->lesson_id);

        if (empty($course) || empty($lesson)) {
            throw new NotFoundHttpException("Trang bạn yêu cầu không tìm thấy");
        }

        if ($teacher_id != '' && $course['teacher_id'] == $teacher_id) {
            return true;
        }

        // kiểm tra học sinh có thuộc lớp học hay không
        $student_course = StudentCourse::findOne(['student_id' => $student_id, 'course_id' => $this->course_id]);

        // kiểm tra học thử 2 buổi miễn phí
        $free_lesson = FreeLessonOnCourse::findOne(['student_id' => $student_id, 'course_id' => $this->course_id]);

        /**
         * return false:
         * + nếu không dăng ký khóa học và hết 2 buổi miễn phí
         */
        if (empty($student_course) && !empty($free_lesson) && intval($free_lesson->number_lesson) == Yii::$app->params['number_free_lesson']) {
            throw new ForbiddenHttpException("Bạn đã học hết số buổi miễn phí cho phép. Hãy đăng ký khóa học để tiếp tục.");
        } else if (empty($student_course) && (empty($free_lesson) || (!empty($free_lesson) && intval($free_lesson->number_lesson) < Yii::$app->params['number_free_lesson']))) {
            if (empty($free_lesson)) {
                $free_lesson = new FreeLessonOnCourse();
            }
            $free_lesson->course_id = $this->course_id;
            $free_lesson->student_id = $student_id;
            $free_lesson->number_lesson += 1;
            $free_lesson->save(false);
        }
    }

    public function actionLessonDetail()
    {
        $course_id = $this->course_id;
        $lesson_id = $this->lesson_id;

        $course = Course::findOne(['course_id' => $course_id]);
        $lesson = LessonCourse::get_lesson($lesson_id);
        $arr_lessons = LessonCourse::get_all_lesson_by_course($course_id);

        if ($course['course_type_id'] == 1) {
            return $this->render('lesson_detail_video', [
                'course' => $course,
                'lesson' => $lesson,
                'arr_lessons' => $arr_lessons
            ]);
        } else {
            return $this->render('lesson_detail_live_stream', [
                'course' => $course,
                'lesson' => $lesson,
                'arr_lessons' => $arr_lessons
            ]);
        }
    }
}