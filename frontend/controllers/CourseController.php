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
        $this->layout = 'main_2';
        return $this->render('list_course');
    }

    public function actionCourseDetail()
    {
        $this->layout = 'main_2';
        return $this->render('course_detail');
    }
}