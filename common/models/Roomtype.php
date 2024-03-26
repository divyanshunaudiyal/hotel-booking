<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roomtype".
 *
 * @property int $id
 * @property string|null $room_type
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class Roomtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roomtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['room_type'], 'string', 'max' => 200],
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
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function roomtypedetails(){
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM roomtype" ;
        
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
    
//    public function
}
