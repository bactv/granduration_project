<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AdminGroup;

/**
 * AdminGroupSearch represents the model behind the search form about `backend\models\AdminGroup`.
 */
class AdminGroupSearch extends AdminGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_group_id', 'ad_group_status'], 'integer'],
            [['ad_group_name', 'ad_group_description', 'ad_group_action_ids', 'ad_group_created_time', 'ad_group_updated_time'], 'safe'],
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
        $query = AdminGroup::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ad_group_id' => $this->ad_group_id,
            'ad_group_status' => $this->ad_group_status,
            'ad_group_created_time' => $this->ad_group_created_time,
            'ad_group_updated_time' => $this->ad_group_updated_time,
        ]);

        $query->andFilterWhere(['like', 'ad_group_name', $this->ad_group_name])
            ->andFilterWhere(['like', 'ad_group_description', $this->ad_group_description])
            ->andFilterWhere(['like', 'ad_group_action_ids', $this->ad_group_action_ids]);

        return $dataProvider;
    }
}
