<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AgreementType;

/**
 * AgreementTypeSearch represents the model behind the search form about `backend\models\AgreementType`.
 */
class AgreementTypeSearch extends AgreementType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_type_id'], 'integer'],
            [['agreement_type_name', 'agreement_type_description'], 'safe'],
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
        $query = AgreementType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'agreement_type_id' => $this->agreement_type_id,
        ]);

        $query->andFilterWhere(['like', 'agreement_type_name', $this->agreement_type_name])
            ->andFilterWhere(['like', 'agreement_type_description', $this->agreement_type_description]);

        return $dataProvider;
    }
}
