<?php

namespace backend\models;

use common\behaviors\TimestampBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;


class ImportFile extends \common\models\ImportFileBase
{
    public $file;

    /**
     * @return array
     */
    public function behaviors()
    {
        return array(
            array(
                'class' => TimestampBehavior::class,
                'attributes' => array(
                    self::EVENT_BEFORE_INSERT => array('created_time', 'updated_time'),
                    self::EVENT_BEFORE_UPDATE => array('updated_time')
                ),
            ),

            array(
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by'
            )
        );
    }

    /**
     * @param $id
     * @param $type_file
     * @return bool
     */
    public function uploadFile($id, $type_file)
    {
        $path = Yii::getAlias('@webroot') . Yii::$app->params['storage_url'] . $type_file . '/';
        if (!is_dir($path)) {
            mkdir($path, 0777);
        }
        if ($this->validate()) {
            $this->file->saveAs($path . $id . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
}