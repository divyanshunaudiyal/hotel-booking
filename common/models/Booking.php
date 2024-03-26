<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string|null $customer_number
 * @property int|null $hotelname_id
 * @property int|null $room_id
 * @property int|null $destination_id
 * @property string|null $from_date
 * @property string|null $to_date
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 * @property int|null $adult
 * @property int|null $children
 * @property float|null $advance_amount
 * @property float|null $total_amount
 * @property string|null $payment_mode
 * @property int|null $created_by
 */
class Booking extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
//            [['hotelname_id', 'room_id', 'destination_id', 'adult', 'children', 'created_by'], 'integer'],
//            [['from_date', 'to_date', 'created_at', 'updated_at'], 'safe'],
//            [['is_active'], 'string'],
//            [['advance_amount', 'total_amount'], 'number'],
//            [['customer_name', 'customer_number', 'payment_mode'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'customer_number' => 'Customer Number',
//            'hotelname_id' => 'Hotelname ID',
//            'room_id' => 'Room ID',
//            'destination_id' => 'Destination ID',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'adult' => 'Adult',
            'children' => 'Children',
            'advance_amount' => 'Advance Amount',
            'total_amount' => 'Total Amount',
            'payment_mode' => 'Payment Mode',
            'created_by' => 'Created By',
        ];
    }

    public function gethotelname($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM hotel_name WHERE user_id = $id ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function bookingdetails() {

        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM booking ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function filteredhoteldetails($location, $date) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM booking WHERE hotelname_id= '$location' AND '$date'>= from_date AND '$date' <= to_date  ";
//                echo $sql;die;

        $command = $connection->createCommand($sql);
        $details = $command->queryAll();
        return $details;
    }

    public function checkrooms($fromdate, $todate, $roomtypeid, $location) {
        $connection = Yii::$app->db;
        $sql = "SELECT bk.*, rd.*, rm.total_rooms 
        FROM booking bk
        JOIN room_details rd ON bk.id = rd.booking_id 
        JOIN rooms rm ON rd.room_type = rm.room_type
        WHERE( '$fromdate' BETWEEN bk.from_date and bk.to_date OR '$todate' BETWEEN bk.from_date and bk.to_date  )
        AND rd.room_type = '$roomtypeid' AND bk.hotelname_id = '$location'";
        $command = $connection->createCommand($sql);
//        echo $sql;die;
        $data = $command->queryAll();
        return $data;
    }

    public function getrooms($location, $roomtypeid) {
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM rooms rm WHERE rm.room_type = '$roomtypeid' AND rm.hotelname_id= '$location' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function extrabedprice($location) {
        $connection = Yii::$app->db;
        $sql = "SELECT extra_bed FROM hotel_name where destination_id = '$location'  ";

        $command = $connection->createCommand($sql);

        $data = $command->queryOne();

        return $data;
    }

    public function roomprice($location, $roomid) {
        $connection = Yii::$app->db;
        $sql = "SELECT price FROM rooms WHERE hotelname_id = '$location' AND room_type = '$roomid' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data['price'];
    }

    public function sumbookings($hotelnameid, $startdate=NULL , $enddate=NULL) {
        $connection = Yii::$app->db;
      $sql = "SELECT SUM(total_amount) as total_amount
        FROM booking bk 
        WHERE bk.hotelname_id = '$hotelnameid'";
      if($startdate && $enddate){
          $sql .= "AND '$enddate' >= bk.from_date 
        AND '$startdate' < bk.to_date";
      }
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }
    
        public function upcomingbookings($offset,$limit) {
        $connection = Yii::$app->db;
        $sql = "SELECT * FROM booking LIMIT $limit OFFSET $offset";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    
    public function detailsfordate($date,$hotelname) {
        $connection = Yii::$app->db;
       $sql = "SELECT  bk.*, rd.*, rm.* 
        FROM booking bk 
        JOIN rooms rm ON rm.hotelname_id = bk.hotelname_id
        JOIN room_details rd ON rd.booking_id = bk.id
        WHERE '$date' BETWEEN bk.from_date AND bk.to_date AND bk.hotelname_id = '$hotelname'";
       echo $sql;die;
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}
