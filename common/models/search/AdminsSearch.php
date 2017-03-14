<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admins;

/**
 * AdminsSearch represents the model behind the search form about `backend\models\Admins`.
 */
class AdminsSearch extends Admins
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'admin_status', 'admin_deleted', 'created_by', 'updated_by'], 'integer'],
            [['admin_username', 'admin_password', 'admin_email', 'created_time', 'updated_time', 'last_login_time', 'group_permission_ids'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Admins::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'admin_id' => $this->admin_id,
            'admin_status' => $this->admin_status,
            'admin_deleted' => $this->admin_deleted,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'last_login_time' => $this->last_login_time,
        ]);

        $query->andFilterWhere(['like', 'admin_username', $this->admin_username])
            ->andFilterWhere(['like', 'admin_password', $this->admin_password])
            ->andFilterWhere(['like', 'admin_email', $this->admin_email])
            ->andFilterWhere(['like', 'group_permission_ids', $this->group_permission_ids]);

        return $dataProvider;
    }
}
