<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_details".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $hotel_name
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class UserDetails extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'user_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['user_id'], 'integer'],
            [['is_active'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['hotel_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'hotel_name' => 'Hotel Name',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function userdetails() {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user_details ud
                INNER JOIN hotel_name hn ON ud.hotel_name = hn.id";
//        echo $sql;die;
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function gethoteldetails($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user_details  WHERE user_id = '$id' ";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }
}