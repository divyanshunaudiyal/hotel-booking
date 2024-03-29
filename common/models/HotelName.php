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
class HotelName extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hotel_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
//            [['destination_id', 'breakfast', 'lunch', 'dinner', 'extra_bed', 'no_of_rooms'], 'required'],
//            [['destination_id', 'user_id', 'no_of_rooms'], 'integer'],
//            [['breakfast', 'lunch', 'dinner', 'extra_bed'], 'number'],
//            [['is_active'], 'string'],
//            [['created_at', 'updated_at'], 'safe'],
//            [['location'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'destination_id' => 'Destination',
            'user_id' => 'User',
            'breakfast' => 'Breakfast',
            'lunch' => 'Lunch',
            'dinner' => 'Dinner',
            'extra_bed' => 'Extra Bed',
            'no_of_rooms' => 'No Of Rooms',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'location' => 'Hotel Name',
        ];
    }

    public function hotelfoodprice($location) {

        $connection = \Yii::$app->db;
        $sql = "SELECT breakfast,lunch,dinner FROM hotel_name WHERE id = '$location' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function gethotels($location) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM hotel_name WHERE id = '$location' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function allhotels() {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM hotel_name  ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}
