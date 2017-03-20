<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Party;

/**
 * PartySearch represents the model behind the search form about `backend\models\Party`.
 */
class PartySearch extends Party
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id', 'party_type_id', 'party_created_by', 'party_updated_by'], 'integer'],
            [['party_name', 'party_rep_title', 'party_address', 'party_tax_code', 'party_phone', 'party_created_time', 'party_updated_time'], 'safe'],
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
        $query = Party::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'party_id' => $this->party_id,
            'party_type_id' => $this->party_type_id,
            'party_created_time' => $this->party_created_time,
            'party_updated_time' => $this->party_updated_time,
            'party_created_by' => $this->party_created_by,
            'party_updated_by' => $this->party_updated_by,
        ]);

        $query->andFilterWhere(['like', 'party_name', $this->party_name])
            ->andFilterWhere(['like', 'party_rep_title', $this->party_rep_title])
            ->andFilterWhere(['like', 'party_address', $this->party_address])
            ->andFilterWhere(['like', 'party_tax_code', $this->party_tax_code])
            ->andFilterWhere(['like', 'party_phone', $this->party_phone]);

        return $dataProvider;
    }
}
