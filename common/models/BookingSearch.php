<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `app\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['id', 'hotelname_id', 'room_id', 'destination_id', 'adult', 'children', 'created_by'], 'integer'],
//            [['customer_name', 'customer_number', 'from_date', 'to_date', 'is_active', 'created_at', 'updated_at', 'payment_mode'], 'safe'],
//            [['advance_amount', 'total_amount'], 'number'],
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
        $query = Booking::find();

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
//            'id' => $this->id,
//            'hotelname_id' => $this->hotelname_id,
//            'room_id' => $this->room_id,
            'destination_id' => $this->destination_id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'adult' => $this->adult,
            'children' => $this->children,
            'advance_amount' => $this->advance_amount,
            'total_amount' => $this->total_amount,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_number', $this->customer_number])
            ->andFilterWhere(['like', 'is_active', $this->is_active])
            ->andFilterWhere(['like', 'payment_mode', $this->payment_mode]);

        return $dataProvider;
    }
    
    
}
