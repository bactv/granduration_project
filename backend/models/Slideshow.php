<?php

namespace backend\models;

use common\components\Utility;
use Yii;


class Slideshow extends \common\models\SlideshowBase
{
    public $img;

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['alt', 'url'], 'string', 'max' => 255],
            ['img', 'file', 'extensions' => 'jpg, png, jpeg, gif'],
            ['img', 'required', 'on' => 'create']
        ];
    }


    /**
     * Upload slideshow
     * @param $id
     * @return bool
     */
    public function uploadImg($id)
    {
        if ($this->img == null) {
            return true;
        }
        $path =  Yii::$app->params['img_url']['slideshow']['folder'] . '/';
        $path2 = Yii::getAlias('@webroot') . '/storage/' . $path;
        if (!is_dir($path2)) {
            mkdir($path2, 0777);
        }
        if ($this->validate()) {
            $this->img->saveAs($path2 . $id . '.png');
            return Utility::uploadFile($path, $path . $id . '.png', Yii::$app->params['cms_url'] . 'storage/' . $path . $id . '.png');
        } else {
            return false;
        }
    }
}