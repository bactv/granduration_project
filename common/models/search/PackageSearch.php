<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Package;

/**
 * PackageSearch represents the model behind the search form about `backend\models\Package`.
 */
class PackageSearch extends Package
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_id', 'pk_status'], 'integer'],
            [['pk_name', 'pk_code', 'pk_description'], 'safe'],
            [['pk_price'], 'number'],
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
        $query = Package::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pk_id' => $this->pk_id,
            'pk_price' => $this->pk_price,
            'pk_status' => $this->pk_status,
        ]);

        $query->andFilterWhere(['like', 'pk_name', $this->pk_name])
            ->andFilterWhere(['like', 'pk_code', $this->pk_code])
            ->andFilterWhere(['like', 'pk_description', $this->pk_description]);

        return $dataProvider;
    }
}
