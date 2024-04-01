<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotels".
 *
 * @property int $id
 * @property string|null $hotel_name
 * @property string $is_active
 * @property string $created_at
 * @property string|null $updated_at
 */
class Hotels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['is_active'], 'string'],
//            [['created_at', 'updated_at'], 'safe'],
//            [['hotel_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_name' => 'Hotel Name',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
     public function gethotels() {
          $connection = \Yii::$app->db;
        $sql = "select * from hotels";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}
