<?php

namespace backend\controllers;

use backend\models\FeedbackToTeacher;
use common\components\Utility;
use Yii;
use backend\models\Course;
use common\models\search\CourseSearch;
use backend\components\BackendController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find()
        ]);

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
        $model->scenario = 'self_create';

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
        $model->signed_to_date = Utility::formatDataTime($model->signed_to_date, '-', '/');
        $model->start_date = Utility::formatDataTime($model->start_date, '-', '/');
        $model->end_date = Utility::formatDataTime($model->end_date, '-', '/');

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
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->deleted = 1;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->approved = 1;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionRefuse($id)
    {
        $model = $this->findModel($id);
        $model->approved = -1;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionSendFeedbackTeacher()
    {
        if (!Yii::$app->request->isAjax && !Yii::$app->request->isPost) {
            echo json_encode(['error' => -1, 'message' => 'Error']);
            Yii::$app->end();
        }
        $request = Yii::$app->request->post();
        $tch_id = isset($request['tch_id']) ? $request['tch_id'] : '';
        $content = isset($request['content']) ? $request['content'] : '';
        $title = isset($request['title']) ? $request['title'] : '';

        if ($tch_id == '' || $content == '') {
            echo json_encode(['error' => -1, 'message' => 'Error']);
            Yii::$app->end();
        }
        $model = new FeedbackToTeacher();
        $model->teacher_id = $tch_id;
        $model->content = $content;
        $model->title = $title;
        $model->created_time = date('Y-m-d H:i:s');
        $model->created_by = Yii::$app->user->identity->ad_id;

        if ($model->save()) {
            echo json_encode(['error' => 1, 'message' => 'Save success.']);
            Yii::$app->end();
        } else {
            echo json_encode(['error' => -1, 'message' => 'Save failed.']);
            Yii::$app->end();
        }

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
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
