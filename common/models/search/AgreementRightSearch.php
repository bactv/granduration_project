<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AgreementRight;

/**
 * AgreementRightSearch represents the model behind the search form about `backend\models\AgreementRight`.
 */
class AgreementRightSearch extends AgreementRight
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agreement_right_id'], 'integer'],
            [['agreement_right_name', 'agreement_right_description'], 'safe'],
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
        $query = AgreementRight::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'agreement_right_id' => $this->agreement_right_id,
        ]);

        $query->andFilterWhere(['like', 'agreement_right_name', $this->agreement_right_name])
            ->andFilterWhere(['like', 'agreement_right_description', $this->agreement_right_description]);

        return $dataProvider;
    }
}
