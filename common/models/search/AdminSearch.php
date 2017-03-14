<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admin;

/**
 * AdminSearch represents the model behind the search form about `backend\models\Admin`.
 */
class AdminSearch extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_id', 'ad_avatar', 'ad_status', 'ad_created_by', 'ad_updated_by'], 'integer'],
            [['ad_username', 'ad_password', 'ad_full_name', 'ad_email', 'ad_profession', 'ad_birthday', 'ad_last_active_time', 'ad_created_time', 'ad_updated_time', 'ad_group_ids'], 'safe'],
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
        $query = Admin::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ad_id' => $this->ad_id,
            'ad_birthday' => $this->ad_birthday,
            'ad_avatar' => $this->ad_avatar,
            'ad_status' => $this->ad_status,
            'ad_last_active_time' => $this->ad_last_active_time,
            'ad_created_by' => $this->ad_created_by,
            'ad_updated_by' => $this->ad_updated_by,
            'ad_created_time' => $this->ad_created_time,
            'ad_updated_time' => $this->ad_updated_time,
        ]);

        $query->andFilterWhere(['like', 'ad_username', $this->ad_username])
            ->andFilterWhere(['like', 'ad_password', $this->ad_password])
            ->andFilterWhere(['like', 'ad_full_name', $this->ad_full_name])
            ->andFilterWhere(['like', 'ad_email', $this->ad_email])
            ->andFilterWhere(['like', 'ad_profession', $this->ad_profession])
            ->andFilterWhere(['like', 'ad_group_ids', $this->ad_group_ids]);

        return $dataProvider;
    }
}
