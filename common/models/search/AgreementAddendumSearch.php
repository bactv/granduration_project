<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AgreementAddendum;

/**
 * AgreementAddendumSearch represents the model behind the search form about `backend\models\AgreementAddendum`.
 */
class AgreementAddendumSearch extends AgreementAddendum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addendum_id', 'agreement_id', 'addendum_created_by', 'addendum_updated_by'], 'integer'],
            [['addendum_number', 'addendum_content', 'addendum_created_time', 'addendum_updated_time'], 'safe'],
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
        $query = AgreementAddendum::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'addendum_id' => $this->addendum_id,
            'agreement_id' => $this->agreement_id,
            'addendum_created_time' => $this->addendum_created_time,
            'addendum_updated_time' => $this->addendum_updated_time,
            'addendum_created_by' => $this->addendum_created_by,
            'addendum_updated_by' => $this->addendum_updated_by,
        ]);

        $query->andFilterWhere(['like', 'addendum_number', $this->addendum_number])
            ->andFilterWhere(['like', 'addendum_content', $this->addendum_content]);

        return $dataProvider;
    }
}
