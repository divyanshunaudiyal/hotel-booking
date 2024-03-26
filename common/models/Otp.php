<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "otp".
 *
 * @property integer $id
 * @property string $name
 * @property string $primary_email
 * @property string $mobile_number
 * @property string $date_of_birth
 * @property integer $otp
 * @property string $otp_expire
 * @property integer $is_active
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 */
class Otp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'otp';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['otp', 'is_active'], 'integer'],
            [['otp_expire', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 65],
            [['primary_email', 'date_of_birth'], 'string', 'max' => 255],
            [['mobile_number'], 'string', 'max' => 30],
            [['created_by', 'updated_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'primary_email' => 'Primary Email',
            'mobile_number' => 'Mobile Number',
            'date_of_birth' => 'Date Of Birth',
            'otp' => 'Otp',
            'otp_expire' => 'Otp Expire',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function Userregister() {
        $db = \Yii::$app->db;
        $sql = "SELECT id,company_name,`type` FROM sponsor_master ORDER BY default_val desc";
        $command = $db->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

}
