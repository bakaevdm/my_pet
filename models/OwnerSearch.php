<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Owner;

/**
 * OwnerSearch represents the model behind the search form of `app\models\Owner`.
 */
class OwnerSearch extends Owner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDowner', 'IDcity', 'IDpet', 'PhoneNumber', 'IDuser'], 'integer'],
            [['LastName', 'FirstName', 'Patronymic', 'Street', 'Building'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Owner::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IDowner' => $this->IDowner,
            'IDcity' => $this->IDcity,
            'IDpet' => $this->IDpet,
            'PhoneNumber' => $this->PhoneNumber,
            'IDuser' => $this->IDuser,
        ]);

        $query->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'Patronymic', $this->Patronymic])
            ->andFilterWhere(['like', 'Street', $this->Street])
            ->andFilterWhere(['like', 'Building', $this->Building]);

        return $dataProvider;
    }
}
