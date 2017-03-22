<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Student;

/**
 * StudentSearch represents the model behind the search form about `backend\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'std_balance', 'std_status'], 'integer'],
            [['std_username', 'std_password', 'std_full_name', 'std_phone', 'std_birthday', 'std_school_name', 'std_created_time', 'std_updated_time'], 'safe'],
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
        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'std_id' => $this->std_id,
            'std_balance' => $this->std_balance,
            'std_status' => $this->std_status,
            'std_created_time' => $this->std_created_time,
            'std_updated_time' => $this->std_updated_time,
        ]);

        $query->andFilterWhere(['like', 'std_username', $this->std_username])
            ->andFilterWhere(['like', 'std_password', $this->std_password])
            ->andFilterWhere(['like', 'std_full_name', $this->std_full_name])
            ->andFilterWhere(['like', 'std_phone', $this->std_phone])
            ->andFilterWhere(['like', 'std_birthday', $this->std_birthday])
            ->andFilterWhere(['like', 'std_school_name', $this->std_school_name]);

        return $dataProvider;
    }
}
