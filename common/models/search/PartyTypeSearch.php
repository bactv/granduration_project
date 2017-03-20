<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PartyType;

/**
 * PartyTypeSearch represents the model behind the search form about `backend\models\PartyType`.
 */
class PartyTypeSearch extends PartyType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_type_id', 'party_type_created_by', 'party_type_updated_by'], 'integer'],
            [['party_type_name', 'party_type_description', 'party_type_created_time', 'party_type_updated_time'], 'safe'],
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
        $query = PartyType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'party_type_id' => $this->party_type_id,
            'party_type_created_time' => $this->party_type_created_time,
            'party_type_updated_time' => $this->party_type_updated_time,
            'party_type_created_by' => $this->party_type_created_by,
            'party_type_updated_by' => $this->party_type_updated_by,
        ]);

        $query->andFilterWhere(['like', 'party_type_name', $this->party_type_name])
            ->andFilterWhere(['like', 'party_type_description', $this->party_type_description]);

        return $dataProvider;
    }
}
