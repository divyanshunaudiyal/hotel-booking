<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HotelName;

/**
 * HotelNameSearch represents the model behind the search form of `app\models\HotelName`.
 */
class HotelNameSearch extends HotelName
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'destination_id', 'user_id', 'no_of_rooms'], 'integer'],
            [['breakfast', 'lunch', 'dinner', 'extra_bed'], 'number'],
            [['is_active', 'created_at', 'updated_at', 'location'], 'safe'],
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
        $query = HotelName::find();

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
            'id' => $this->id,
            'destination_id' => $this->destination_id,
            'user_id' => $this->user_id,
            'breakfast' => $this->breakfast,
            'lunch' => $this->lunch,
            'dinner' => $this->dinner,
            'extra_bed' => $this->extra_bed,
            'no_of_rooms' => $this->no_of_rooms,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'is_active', $this->is_active])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
