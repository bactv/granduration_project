<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\QuestionAnswer;

/**
 * QuestionAnswerSearch represents the model behind the search form about `backend\models\QuestionAnswer`.
 */
class QuestionAnswerSearch extends QuestionAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ans_id', 'question_id', 'is_true'], 'integer'],
            [['question_content', 'ans_content'], 'safe'],
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
        $query = QuestionAnswer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ans_id' => $this->ans_id,
            'question_id' => $this->question_id,
            'is_true' => $this->is_true,
        ]);

        $query->andFilterWhere(['like', 'question_content', $this->question_content])
            ->andFilterWhere(['like', 'ans_content', $this->ans_content]);

        return $dataProvider;
    }
}
