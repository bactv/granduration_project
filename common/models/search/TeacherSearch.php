<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form about `backend\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tch_id', 'tch_gender', 'tch_status', 'tch_created_by', 'tch_updated_by'], 'integer'],
            [['tch_username', 'tch_password', 'tch_full_name', 'tch_intro', 'tch_work_place', 'tch_degree', 'tch_email', 'tch_created_time', 'tch_updated_time'], 'safe'],
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
        $query = Teacher::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tch_id' => $this->tch_id,
            'tch_gender' => $this->tch_gender,
            'tch_status' => $this->tch_status,
            'tch_created_time' => $this->tch_created_time,
            'tch_updated_time' => $this->tch_updated_time,
            'tch_created_by' => $this->tch_created_by,
            'tch_updated_by' => $this->tch_updated_by,
        ]);

        $query->andFilterWhere(['like', 'tch_username', $this->tch_username])
            ->andFilterWhere(['like', 'tch_password', $this->tch_password])
            ->andFilterWhere(['like', 'tch_full_name', $this->tch_full_name])
            ->andFilterWhere(['like', 'tch_intro', $this->tch_intro])
            ->andFilterWhere(['like', 'tch_work_place', $this->tch_work_place])
            ->andFilterWhere(['like', 'tch_degree', $this->tch_degree])
            ->andFilterWhere(['like', 'tch_email', $this->tch_email]);

        return $dataProvider;
    }
}
