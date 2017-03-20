<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Agreement;

/**
 * AgreementSearch represents the model behind the search form about `backend\models\Agreement`.
 */
class AgreementSearch extends Agreement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_id', 'party_id_a', 'party_id_b', 'agreement_right_id', 'agreement_type_id', 'agreement_created_by', 'agreement_updated_by'], 'integer'],
            [['agreement_code', 'agreement_signed_date', 'agreement_effective_date', 'agreement_created_time', 'agreement_updated_time'], 'safe'],
            [['mg'], 'number'],
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
        $query = Agreement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'agreement_id' => $this->agreement_id,
            'party_id_a' => $this->party_id_a,
            'party_id_b' => $this->party_id_b,
            'agreement_signed_date' => $this->agreement_signed_date,
            'agreement_effective_date' => $this->agreement_effective_date,
            'agreement_right_id' => $this->agreement_right_id,
            'agreement_type_id' => $this->agreement_type_id,
            'mg' => $this->mg,
            'agreement_created_time' => $this->agreement_created_time,
            'agreement_updated_time' => $this->agreement_updated_time,
            'agreement_created_by' => $this->agreement_created_by,
            'agreement_updated_by' => $this->agreement_updated_by,
        ]);

        $query->andFilterWhere(['like', 'agreement_code', $this->agreement_code]);

        return $dataProvider;
    }
}
