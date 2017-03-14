<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property integer $admin_id
 * @property string $admin_username
 * @property string $admin_password
 * @property string $admin_email
 * @property integer $admin_status
 * @property integer $admin_deleted
 * @property string $created_time
 * @property string $updated_time
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $last_login_time
 * @property string $group_permission_ids
 */
class AdminsDB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_username', 'admin_password'], 'required'],
            [['admin_status', 'admin_deleted', 'created_by', 'updated_by'], 'integer'],
            [['created_time', 'updated_time', 'last_login_time'], 'safe'],
            [['admin_username', 'admin_password', 'admin_email', 'group_permission_ids'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => Yii::t('cms', 'Admin ID'),
            'admin_username' => Yii::t('cms', 'Admin Username'),
            'admin_password' => Yii::t('cms', 'Admin Password'),
            'admin_email' => Yii::t('cms', 'Admin Email'),
            'admin_status' => Yii::t('cms', 'Admin Status'),
            'admin_deleted' => Yii::t('cms', 'Admin Deleted'),
            'created_time' => Yii::t('cms', 'Created Time'),
            'updated_time' => Yii::t('cms', 'Updated Time'),
            'created_by' => Yii::t('cms', 'Created By'),
            'updated_by' => Yii::t('cms', 'Updated By'),
            'last_login_time' => Yii::t('cms', 'Last Login Time'),
            'group_permission_ids' => Yii::t('cms', 'Group Permission Ids'),
        ];
    }
}
