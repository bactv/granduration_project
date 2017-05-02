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
use frontend\models\CourseNews;
use frontend\models\LessonCourse;
use frontend\models\Teacher;
use Yii;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class CmsCourseManagerController extends Controller
{
    protected $course_id;
    protected $course;
    protected $course_type_id;
    protected $teacher_id;

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
        $this->course_type_id = $course['course_type_id'];
        $this->teacher_id = $teacher_id;
    }

    public function actionIndex()
    {
        $course = $this->course;
        if ($course['course_type_id'] == 1) {
            return $this->render('video/index_2', [
                'course' => $course,
            ]);
        } else if ($course['course_type_id'] == 2) {
            return $this->render('live_stream/index', [
                'course' => $course,
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

    /**
     * Quản lý danh sách bài học
     * @return string
     */
    public function actionLesson()
    {
        $lessons = LessonCourse::findAll(['course_id' => $this->course_id]);
        if ($this->course_type_id == 1) {
            return $this->render('video/lesson_index', [
                'lessons' => $lessons,
                'course' => $this->course
            ]);
        } else if ($this->course_type_id == 2) {
            return $this->render('live_stream/lesson_index', [
                'lessons' => $lessons,
                'course' => $this->course
            ]);
        }
    }

    /**
     * Quản lý danh sách tài liệu tham khảo
     * @return string
     */
    public function actionReferences()
    {
        $path = './' . Yii::$app->params['img_url']['courses_assets']['folder'] . '/' . $this->teacher_id . '/' . $this->course_id . '/references/';
        $allFiles = Utility::get_all_remote_file_in_folder($path);
        if ($allFiles == false) {
            $allFiles = [];
        }
        if ($this->course_type_id == 1) {
            return $this->render('video/references_index', [
                'course' => $this->course,
                'allFiles' => $allFiles
            ]);
        } else if ($this->course_type_id == 2) {
            return $this->render('live_stream/references_index', [
                'course' => $this->course,
                'allFiles' => $allFiles
            ]);
        }
    }



    /* ==============================  QUẢN LÝ TIN TỨC, THÔNG BÁO  ====================================  */

    /**
     * Quản lý tin tức, thông báo
     * @return string
     */
    public function actionNews()
    {
        $data = CourseNews::get_list_news($this->course_id);
        $pagination = $data['pagination'];
        $list_news = $data['data'];
        if ($this->course_type_id == 1) {
            return $this->render('video/news/news_index', [
                'course' => $this->course,
                'list_news' => $list_news,
                'pagination' => $pagination
            ]);
        } else if ($this->course_type_id == 2) {
            return $this->render('live_stream/news/news_index', [
                'course' => $this->course,
                'list_news' => $list_news,
                'pagination' => $pagination
            ]);
        }
    }
    /**
     * Displays a single CourseNews model.
     * @return mixed
     */
    public function actionNewsView()
    {
        $request = Yii::$app->request->get();

        $news_id = isset($request['news_id']) ? $request['news_id'] : '';

        if ($this->course_type_id == 1) {
            return $this->render('video/news/view', [
                'model' => CourseNews::findOne(['id' => $news_id]),
                'course' => $this->course
            ]);
        } else if ($this->course_type_id == 2) {
            return $this->render('live_stream/news/view', [
                'model' => CourseNews::findOne(['id' => $news_id]),
                'course' => $this->course
            ]);
        }
    }

    /**
     * Creates a new CourseNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionNewsCreate()
    {
        $model = new CourseNews();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['news-views', 'news_id' => $model->id]);
        } else {
            if ($this->course_type_id == 1) {
                return $this->render('video/news/create', [
                    'model' => $model,
                    'course' => $this->course
                ]);
            } else if ($this->course_type_id == 2) {
                return $this->render('live_stream/news/create', [
                    'model' => $model,
                    'course' => $this->course
                ]);
            }
        }
    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionNewsUpdate()
    {
        $request = Yii::$app->request->get();

        $news_id = isset($request['news_id']) ? $request['news_id'] : '';
        $model = CourseNews::findOne(['id' => $news_id]);

        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['news-views', 'news_id' => $model->id]);
        } else {
            if ($this->course_type_id == 1) {
                return $this->render('video/news/update', [
                    'model' => $model,
                    'course' => $this->course
                ]);
            } else if ($this->course_type_id == 2) {
                return $this->render('live_stream/news/update', [
                    'model' => $model,
                    'course' => $this->course
                ]);
            }
        }
    }

    /**
     * Deletes an existing CourseNews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteNews($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->deleted = 1;
        $model->save();
        return $this->redirect(['index']);
    }
}