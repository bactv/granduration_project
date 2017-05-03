<?php

namespace backend_teacher\controllers;

use backend_teacher\models\CourseNews;
use common\components\Utility;
use Yii;
use backend_teacher\models\Course;
use common\models\search\CourseSearch;
use backend_teacher\components\BackendController;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $this->teacher['tch_id']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $session = Yii::$app->session;

        $model = $this->findModel($id);
        if ($model->approved != 1) {
            $model->deleted = 1;
            if ($model->save()) {
                $session->setFlash('success', 'Xóa thành công');
            } else {
                $session->setFlash('error', 'Xóa thất bại');
            }

        } else {
            $session->setFlash('error', 'Khóa học đã phê duyệt, bạn không thể xóa.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['course_id' => $id, 'teacher_id' => $this->teacher['tch_id'], 'deleted' => 0])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /* =========================== QUAN LY TAI LIEU THAM KHAO ============================== */
    public function actionReferences($course_id)
    {
        $results = [];
        $course = $this->findModel($course_id);
        $path = './' . Yii::$app->params['img_url']['courses_assets']['folder'] . '/' . $this->teacher['tch_id'] . '/' . $course_id . '/references/';
        $url_remote = Yii::$app->params['storage_url'] . Yii::$app->params['img_url']['courses_assets']['folder'] . '/' . $this->teacher['tch_id'] . '/' . $course_id . '/references/';
        $allFiles = Utility::get_all_remote_file_in_folder($path);
        if (is_array($allFiles)) {
            foreach ($allFiles as $file) {
                $results[] = [
                    'link' => $url_remote . basename($file),
                    'name' => basename($file),
                    'path' => $file
                ];
            }
        }
        return $this->renderAjax('references', [
            'allFiles' => $results,
            'course' => $course
        ]);
    }

    public function actionDeleteReferences($file, $course_id)
    {
        if (!Yii::$app->request->post()) {
            Yii::$app->end();
        }

        $session = Yii::$app->session;
        if (Utility::delete_file_on_remote($file)) {
            $session->setFlash('success', 'Xóa thành công');
        } else {
            $session->setFlash('error', 'Xóa thất bại');
        }
        return $this->redirect(['view', 'id' => $course_id, '#' => 'course_references']);
    }

    public function actionAddReferences()
    {
        $session = Yii::$app->session;
        $course_id = isset($_REQUEST['course_id']) ? $_REQUEST['course_id'] : '';
        $course = $this->findModel($course_id);

        if ($course->load(Yii::$app->request->post())) {
            $course->references = UploadedFile::getInstances($course, 'references');

            if ($course->upload_file('references', $this->teacher['tch_id'], $course_id, 'references', true)) {
                $session->setFlash('success', 'Thêm tài liệu thành công');
                return $this->redirect(['view', 'id' => $course_id, '#' => 'course_references']);
            } else {
                $session->setFlash('success', 'Thêm tài liệu thất bại');
                return $this->renderAjax('add-references', [
                    'course' => $course
                ]);
            }
        }

        return $this->renderAjax('add-references', [
            'course' => $course
        ]);
    }

    /* =========================== QUAN LY TIN TƯC, THONG BAO ============================== */
    public function actionNews($course_id)
    {
        $course = $this->findModel($course_id);
        $dataProvider = new ActiveDataProvider([
            'query' => CourseNews::find()->where(['course_id' => $course_id])
        ]);
        return $this->renderAjax('news', [
            'course' => $course,
            'dataProvider' => $dataProvider
        ]);
    }
}
