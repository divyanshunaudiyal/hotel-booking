<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_details".
 *
 * @property int $id
 * @property int|null $room_type
 * @property int|null $no_of_rooms
 * @property string|null $booking_id
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class Roomdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['room_type', 'no_of_rooms'], 'integer'],
//            [['is_active'], 'string'],
//            [['created_at', 'updated_at'], 'safe'],
//            [['booking_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_type' => 'Room Type',
            'no_of_rooms' => 'No Of Rooms',
            'booking_id' => 'Booking ID',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function roomdetails(){
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM room_details";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    public function roomsbooked($id){
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM room_details WHERE booking_id = '$id' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }
    public function hotelroomdetails($id,$date,$roomid){
         $connection = \Yii::$app->db;
        $sql = "SELECT SUM(rd.no_of_rooms) as booked_room FROM room_details rd JOIN booking b ON b.id = rd.booking_id WHERE b.hotelname_id = '$id' AND '$date' BETWEEN b.from_date AND b.to_date && rd.room_type = '$roomid'";
        
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
//        echo $sql;die;
        return $data;
    }
    
       public function bookingroomdetails($id){
           $id = trim($id);
         $connection = \Yii::$app->db;
        $sql = "SELECT * FROM room_details WHERE booking_id = '$id' ";
        
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
//        echo $sql;die;
        return $data;
    }
}
