<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 02/04/2017
 * Time: 10:02 SA
 */
namespace frontend\controllers;

use frontend\components\FrontendController;
use frontend\models\Teacher;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class TeacherController extends FrontendController
{
    public function actionIndex()
    {
        $request = Yii::$app->request->get();
        $class_id = isset($request['class_id']) ? $request['class_id'] : '';
        $subject_id = isset($request['subject_id']) ? $request['subject_id'] : '';

        $params = [
            'class_id' => $class_id,
            'subject_id' => $subject_id
        ];

        $list_teacher = Teacher::get_list_teacher($params);
        return $this->render('index', [
            'lists' => $list_teacher
        ]);
    }

    public function actionDetail($id)
    {
        $teacher = Teacher::findOne(['tch_id' => $id]);
        if (empty($teacher)) {
            throw new NotFoundHttpException("Trang bạn tìm kiếm không tìm thấy.");
        }
        return $this->render('detail', [
            'teacher' => $teacher
        ]);
    }
}