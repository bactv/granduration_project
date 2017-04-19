<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:43 CH
 */
namespace frontend\controllers;

use yii\web\Controller;

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

    public function actionOnCourse()
    {
        
    }
}