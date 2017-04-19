<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Course;

/**
 * CourseSearch represents the model behind the search form about `backend\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'teacher_id', 'party_id', 'course_type_id', 'subject_id', 'class_level_id', 'privacy', 'status', 'approved', 'approver', 'created_by', 'updated_by'], 'integer'],
            [['course_name', 'course_description', 'signed_to_date', 'start_date', 'end_date', 'created_time', 'updated_time'], 'safe'],
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
        $query = Course::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($this->load($params) && !$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'course_id' => $this->course_id,
            'teacher_id' => $this->teacher_id,
            'party_id' => $this->party_id,
            'course_type_id' => $this->course_type_id,
            'price' => $this->price,
            'signed_to_date' => $this->signed_to_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'subject_id' => $this->subject_id,
            'class_level_id' => $this->class_level_id,
            'privacy' => $this->privacy,
            'status' => $this->status,
            'approved' => $this->approved,
            'approver' => $this->approver,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'course_description', $this->course_description]);

        return $dataProvider;
    }
}
