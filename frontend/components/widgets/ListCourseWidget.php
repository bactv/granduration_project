<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 26/03/2017
 * Time: 9:07 SA
 */
namespace frontend\components\widgets;

use frontend\components\WidgetBase;
use frontend\models\Course;
use Yii;
use yii\db\Query;

class ListCourseWidget extends WidgetBase
{
    public $dir;
    public $view = 'index';
    public $type = '';
    public $title = '';
    public $list_course;
    public $limit = 20;
    public $pagination;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if ($this->type == '') {
            $list_course = $this->list_course;
        } else {
            $list_course = Course::find()->where([
                'privacy' => 1,
                'approved' => 1,
                'status' => 1,
                'deleted' => 0
            ]);
            if ($this->type == 'free') {
                $this->title = 'Khóa học miễn phí';
                $list_course->andWhere(['price' => 0]);
            } else if ($this->type == 'hot') {
                $this->title = 'Khóa học hot nhất';
                $query = (new Query())
                    ->select(['course_id', 'COUNT(*) as total_std'])
                    ->from('student_course')
                    ->groupBy('course_id')
                    ->orderBy('total_std')
                    ->all();
                $arr_course_ids = [];
                foreach ($query as $dt) {
                    $arr_course_ids[] = $dt['course_id'];
                }
                $list_course->andWhere(['course_id' => $arr_course_ids]);
            } else {
                $this->title = 'Tất cả khóa học';
            }
            $list_course = $list_course->limit(10)->all();
        }
        return $this->render($this->dir . DIRECTORY_SEPARATOR . $this->view, [
            'list_course' => $list_course,
            'title' => $this->title,
            'pagination' => $this->pagination,
            'type' => $this->type
        ]);
    }
}
