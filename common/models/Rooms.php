<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property int $id
 * @property int|null $hotelname_id
 * @property string|null $room_type
 * @property float|null $price
 * @property int|null $total_rooms
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class Rooms extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['hotelname_id', 'total_rooms'], 'integer'],
            [['price'], 'number'],
            [['is_active'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['room_type'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'hotelname_id' => 'Hotelname ID',
            'room_type' => 'Room Type',
            'price' => 'Price',
            'total_rooms' => 'Total Rooms',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function roomslist($id, $type) {
        $connection = \Yii::$app->db;
        if ($type == 'superadmin') {
            $sql = "SELECT * , rooms.id as rid
                FROM rooms
                INNER JOIN hotel_name ON rooms.hotelname_id = hotel_name.id ;
 ";
        } else {
            $sql = "SELECT * , rooms.id as rid
                FROM rooms
                INNER JOIN hotel_name ON rooms.hotelname_id = hotel_name.id WHERE hotel_name.user_id = '$id';
 ";
        }

        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function roomenquirelist($hotelid) {
        $connection = \Yii::$app->db;
        $sql = "select * from rooms WHERE rooms.hotelname_id = '$hotelid' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
        public function enquirydatalist($hotelid) {
        $connection = \Yii::$app->db;
        $sql = "select r.*,rt.id, rt.room_type, rt.room_category as room_name from rooms r LEFT JOIN roomtype rt ON rt.id = r.room_type WHERE r.hotelname_id = '$hotelid';";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
      
        return $data;
    }

    public function allhotellist() {
        $connection = \Yii::$app->db;
        $sql = "select * from hotel_name ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function hotellist($id) {
        $connection = \Yii::$app->db;
        $sql = "select * from hotel_name ";
        if (!empty($id)) {
            $sql .= " WHERE hotel_name.user_id = '$id' ";
        }
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function roomlist($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT rm.*, hn.location as hotelname, d.destination_name FROM rooms rm LEFT JOIN hotel_name hn ON hn.id = rm.hotelname_id LEFT JOIN destination d ON d.id = hn.destination_id ";
        if (!empty($id)) {
            $sql .= " WHERE hn.user_id = '$id' ";
        }
        $sql .= " ORDER BY rm.id DESC ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function hotelroomlist($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT rm.*, hn.location as hotelname, d.destination_name FROM rooms rm LEFT JOIN hotel_name hn ON hn.id = rm.hotelname_id LEFT JOIN destination d ON d.id = hn.destination_id ";
        if (!empty($id)) {
            $sql .= " WHERE hn.id = '$id' ";
        }
        $sql .= " ORDER BY rm.id ASC ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function specifichotelroomlist($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT rm.*, hn.location as hotelname, d.destination_name FROM rooms rm LEFT JOIN hotel_name hn ON hn.id = rm.hotelname_id LEFT JOIN destination d ON d.id = hn.destination_id ";
        if (!empty($id)) {
            $sql .= " WHERE rm.hotelname_id = '$id'AND hn.id= '$id' ";
        }
        $sql .= " ORDER BY rm.id ASC ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function roomsdetails() {
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM rooms";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function enquireroomdetails($hotelid, $roomtype) {
        $connection = Yii::$app->db;
        $sql = "SELECT total_rooms FROM rooms rm WHERE rm.hotelname_id = '$hotelid' AND rm.room_type = '$roomtype' ";
        $command = $connection->createCommand($sql);
//        echo $sql;die;
        $data = $command->queryOne();
        return $data;
    }
}
