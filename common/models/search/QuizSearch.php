<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Quiz;

/**
 * QuizSearch represents the model behind the search form about `backend\models\Quiz`.
 */
class QuizSearch extends Quiz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quiz_id', 'quiz_type_id', 'subject_id', 'class_level_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['quiz_name', 'quiz_description', 'quiz_level', 'question_ids', 'section', 'created_time', 'updated_time'], 'safe'],
            [['price'], 'number'],
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
        $query = Quiz::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'quiz_id' => $this->quiz_id,
            'quiz_type_id' => $this->quiz_type_id,
            'subject_id' => $this->subject_id,
            'class_level_id' => $this->class_level_id,
            'status' => $this->status,
            'price' => $this->price,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'quiz_name', $this->quiz_name])
            ->andFilterWhere(['like', 'quiz_description', $this->quiz_description])
            ->andFilterWhere(['like', 'quiz_level', $this->quiz_level])
            ->andFilterWhere(['like', 'question_ids', $this->question_ids])
            ->andFilterWhere(['like', 'section', $this->section]);

        return $dataProvider;
    }
}
