<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\QuizType;

/**
 * QuizTypeSearch represents the model behind the search form about `backend\models\QuizType`.
 */
class QuizTypeSearch extends QuizType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quiz_type_id', 'number_quiz'], 'integer'],
            [['quiz_type_name', 'quiz_type_description'], 'safe'],
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
        $query = QuizType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'quiz_type_id' => $this->quiz_type_id,
            'number_quiz' => $this->number_quiz,
        ]);

        $query->andFilterWhere(['like', 'quiz_type_name', $this->quiz_type_name])
            ->andFilterWhere(['like', 'quiz_type_description', $this->quiz_type_description]);

        return $dataProvider;
    }
}
