<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ClassLevel;

/**
 * ClassLevelSearch represents the model behind the search form about `backend\models\ClassLevel`.
 */
class ClassLevelSearch extends ClassLevel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_level_id'], 'integer'],
            [['class_level_name'], 'safe'],
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
        $query = ClassLevel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'class_level_id' => $this->class_level_id,
        ]);

        $query->andFilterWhere(['like', 'class_level_name', $this->class_level_name]);

        return $dataProvider;
    }
}
