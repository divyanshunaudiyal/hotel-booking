<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel_name".
 *
 * @property int $id
 * @property int $destination_id
 * @property int|null $user_id
 * @property float $breakfast
 * @property float $lunch
 * @property float $dinner
 * @property float $extra_bed
 * @property int $no_of_rooms
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $location
 */
class HotelName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['destination_id', 'breakfast', 'lunch', 'dinner', 'extra_bed', 'no_of_rooms'], 'required'],
            [['destination_id', 'user_id', 'no_of_rooms'], 'integer'],
            [['breakfast', 'lunch', 'dinner', 'extra_bed'], 'number'],
            [['is_active'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['location'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'destination_id' => 'Destination ID',
            'user_id' => 'User ID',
            'breakfast' => 'Breakfast',
            'lunch' => 'Lunch',
            'dinner' => 'Dinner',
            'extra_bed' => 'Extra Bed',
            'no_of_rooms' => 'No Of Rooms',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'location' => 'Location',
        ];
    }
}
