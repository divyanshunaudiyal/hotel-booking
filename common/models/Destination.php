<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "destination".
 *
 * @property int $id
 * @property string|null $destination_name
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class Destination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'destination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['destination_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'destination_name' => 'Destination Name',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function destinationlist(){
        $connection = \Yii::$app->db;
        $sql = "select * from destination ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
        public function userlist(){
        $connection = \Yii::$app->db;
        $sql = "select *  from user where is_active = '1' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    
     public function hotellistindex($id){
        $connection = \Yii::$app->db;
        $sql = "select hn.*, dn.destination_name,ud.user_id,ud.hotel_name as hotel_access
                FROM hotel_name hn
               INNER JOIN destination dn ON hn.destination_id=dn.id 
               INNER JOIN user_details ud ON hn.user_id = ud.user_id";
        if(!empty($id)){
                    $sql .= " WHERE hn.user_id = '$id' ";
        }
        $sql .= ' ORDER BY hn.id DESC ';
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    
    public function hotellist($id){
        $connection = \Yii::$app->db;
        $sql = "select hn.*, dn.destination_name,ud.*
                FROM hotel_name hn
               INNER JOIN destination dn ON hn.destination_id=dn.id 
               INNER JOIN user_details ud ON hn.user_id = ud.user_id";
        if(!empty($id)){
                    $sql .= " WHERE hn.user_id = '$id' ";
        }
        $sql .= ' ORDER BY hn.id DESC ';
//        echo $sql;die;
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    
    
    public function hoteleditlist($id){
        $connection = \Yii::$app->db;
        $sql = "select *
                FROM hotel_name 
                WHERE user_id = $id ";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}
