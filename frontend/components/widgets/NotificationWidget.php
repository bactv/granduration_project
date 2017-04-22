<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 22/04/2017
 * Time: 3:19 CH
 */
namespace frontend\components\widgets;

use common\components\Utility;
use frontend\components\WidgetBase;
use frontend\models\FeedbackToTeacher;
use Yii;

class NotificationWidget extends WidgetBase
{
    public $dir;
    public $view = 'index';
    public $arr_items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $arr_notification = [];
        $new_notification = 0;

        //nếu là feedback của giáo viên
        if (isset(Yii::$app->user->identity->type) && Yii::$app->user->identity->type == 2) {
            $lists = FeedbackToTeacher::find()->orderBy('created_time desc')->asArray()->all();
            foreach ($lists as $list) {
                $arr_notification[] = [
                    'feed_id' => $list['id'],
                    'sender_id' => 0,
                    'title' => $list['title'],
                    'content' => $list['content'],
                    'view_status' => $list['status_view'],
                    'time' => Utility::formatDataTime($list['created_time'], '-', '/', true)
                ];
                if ($list['status_view'] == 0) {
                    $new_notification += 1;
                }
            }
        }
        return $this->render($this->dir . DIRECTORY_SEPARATOR . $this->view, [
            'arr_notification' => $arr_notification,
            'new_notification' => $new_notification
        ]);
    }
}