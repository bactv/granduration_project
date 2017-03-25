<?php

namespace backend\controllers;

use backend\models\AgreementAddendum;
use common\components\Utility;
use Yii;
use backend\models\Agreement;
use common\models\search\AgreementSearch;
use backend\components\BackendController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AgreementController implements the CRUD actions for Agreement model.
 */
class AgreementController extends BackendController
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
     * Lists all Agreement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgreementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Agreement model.
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
     * Creates a new Agreement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Agreement();

        $request = Yii::$app->request->post();

        if ($model->load($request)) {
            $model->party_id_a = (isset($model->party_id_a)) ? $model->party_id_a : 1;
            $model->agreement_right_ids = (!empty($request['Agreement']['agreement_right_ids'])) ? json_encode($request['Agreement']['agreement_right_ids']) : '';
            $model->agreement_signed_date = Utility::formatDataTime($model->agreement_signed_date, '/', '-', false);
            $model->agreement_effective_date = Utility::formatDataTime($model->agreement_effective_date, '/', '-', false);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->agreement_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Agreement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $request = Yii::$app->request->post();

        $model->agreement_signed_date = Utility::formatDataTime($model->agreement_signed_date, '-', '/', false);
        $model->agreement_effective_date = Utility::formatDataTime($model->agreement_effective_date, '-', '/', false);
        $model->agreement_right_ids = json_decode($model->agreement_right_ids);

        if ($model->load($request)) {
            $model->agreement_right_ids = (!empty($request['Agreement']['agreement_right_ids'])) ? json_encode($request['Agreement']['agreement_right_ids']) : '';
            $model->agreement_signed_date = Utility::formatDataTime($model->agreement_signed_date, '/', '-', false);
            $model->agreement_effective_date = Utility::formatDataTime($model->agreement_effective_date, '/', '-', false);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->agreement_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Agreement model.
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

    /**
     *  Ajax view agreement
     * @param $agreement_id
     * @return string
     */
    public function actionViewAgreement($agreement_id)
    {
        $model = Agreement::findByIdentify(['agreement_id' => $agreement_id]);
        return $this->renderAjax('view-agreement', [
            'model' => $model
        ]);
    }

    public function actionAddendum($agreement_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AgreementAddendum::find()->where(['agreement_id' => $agreement_id]),
        ]);
        return $this->renderAjax('agreement-addendum', [
            'dataProvider' => $dataProvider
        ]);
    }


    /**
     * Finds the Agreement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agreement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agreement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
