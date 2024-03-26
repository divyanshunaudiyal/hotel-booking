<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\data\ActiveDataProvider;
use yii\db\mssql\PDO;
use common\models\Utility;
use yii\data\Pagination;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use \common\models\ServicesActivities;

class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 'enabled ';
    const ROLE_USER = '';

    public $rememberMe;
    public $old_password_hash;
    public $new_password_hash;
    public $confirm_password_hash;
    public $confirm_password;
    public $role;
    public $repeat_password;
    public $file_ext;
    public $password;
    public $userEmails;
    public $userMobiles;
    public $userKycs;
    public $userTimelines;
    //public $email;
    public $message;

    public function AfterLogin() {
        
    }

    public static function tableName() {
        return 'user';
    }

    public function scenarios() {

        $scenarios = parent::scenarios();
        $scenarios['send_otp'] = ['otp_expire', 'otp', 'safe'];
        $scenarios['send_token'] = ['token', 'safe'];
        return $scenarios;
    }

    public function rules() {
        return [
            [['created_at', 'date_of_birth'], 'safe'],
            [['username'], 'string', 'max' => 65],
            [['mobile'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 64],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_of_birth' => 'Date Of Birth',
            'company_id' => 'Company Name',
            'username' => 'User Name',
            'password_hash' => 'Password',
            'user_type' => 'User Type',
            'mobile' => 'Mobile',
        ];
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    function RegisterSignupCheck($mobNo, $emailId) {
        $rows = '';
        if (!empty($mobNo)) {
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand('
         SELECT distinct(id)
          FROM user
         WHERE `mobile` =' . $mobNo . '');

            $rows = $command->queryAll();
        }
        if (empty($rows) && !empty($emailId)) {
            $connection = Yii::$app->getDb();
            $sql = "SELECT distinct(id)
         FROM user WHERE email ='$emailId'";
            $command = $connection->createCommand($sql);
            $rows = $command->queryAll();
        }
        return $rows;
    }

    public function getTotalUser($user) {
        $sql = "select count(user.id) from user  where ((LOWER(user.email)=:user)
            or (user.mobile=:user))";
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(":user", strtolower($user), PDO::PARAM_STR);
        $data = $command->queryAll();
        return count($data);
    }

    public function getUserVerified($user, $dob, $password) {
        $sql = "select user.id from user
            where ((LOWER(user.email)=:user)
            or (user.mobile=:user))
            and user.date_of_birth=:dob";
        $connection = \Yii::$app->db;
        // echo  $sql;die;
        $command = $connection->createCommand($sql);
        $command->bindValue(":user", strtolower($user), PDO::PARAM_STR);
        $command->bindValue(":password", $password, PDO::PARAM_STR);
        $command->bindValue(":dob", $dob, PDO::PARAM_STR);
        $data = $command->queryAll();

        return count($data);
    }

    public function getUser($user, $dob, $password) {
        $sql = "select user.id from user where ((LOWER(user.email)=:user)
            or (user.mobile=:user))
            and user.date_of_birth=:dob";
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(":user", strtolower($user), PDO::PARAM_STR);
        $command->bindValue(":password", $password, PDO::PARAM_STR);
        $command->bindValue(":dob", $dob, PDO::PARAM_STR);
        $data = $command->queryAll();

        return count($data);
    }

    public function getUserForlogin1($user_name, $password) {
        $connection = \Yii::$app->db;
        $sql = "select user.id,user.password_hash from user where (user.username=:user or user.email=:user or user.mobile=:user)";
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(":user", $user_name, PDO::PARAM_STR);
        $data = $command->queryOne();
        if (!empty($data)) {
            if (!empty($data['password_hash'])) {
                if (Yii::$app->security->validatePassword($password, $data['password_hash'])) {
                    return $data['id'];
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function getUserForloginadmin($user_name, $password) {
        $connection = \Yii::$app->db;
        $sql = "select user.id,user.password_hash from user where (user.email=:user or user.mobile=:user) and user_access_id = 3";
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(":user", $user_name, PDO::PARAM_STR);
        $data = $command->queryOne();
        if (!empty($data)) {
            if (!empty($data['password_hash'])) {
                if (Yii::$app->security->validatePassword($password, $data['password_hash'])) {
                    return $data['id'];
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function getUserInfo($uid) {
        $connection = \Yii::$app->db;
        $sql = "select user.username from   user where  user.id =   :uid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":uid", $uid);
        $data = $command->queryOne();
        if (!empty($data)) {
            return $data;
        } else {
            return FALSE;
        }
    }

    public function logoutStatus($user_id, $user_status, $loginout_time) {
        $connection = \Yii::$app->db;
        $selectSql = "select id from login_status where user_id = " . "$user_id" . " order by id desc limit 0,1";
        $selectCommand = $connection->createCommand($selectSql)->queryOne();
        if (!empty($selectCommand['id'])) {
            $id = $selectCommand['id'];
            $sql = "UPDATE login_status SET logout_time='$loginout_time', logout_reason='$user_status' WHERE id=$id";
            $command = $connection->createCommand($sql)->execute();
        }
    }

    public function checkemail($email) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function userdetails($uid) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user WHERE id = $uid";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function company() {
        $connection = \Yii::$app->db;
        $sql = "SELECT id,company_name from company order by id asc";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function userlist() {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user ORDER BY id DESC";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    public function Useradmin($id) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * FROM user where id = $id";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function Companydata($id) {
        $connection = \Yii::$app->db;
        $sql = "select c.company_name,c.logo ,u.company_id from user u left join company c on c.id = u.company_id where u.id = $id";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function usertypedata($uid) {
        $connection = \Yii::$app->db;
        $sql = "SELECT * from user where id = $uid";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function Eraonspdf() {
        $connection = \Yii::$app->db;
        $sql = "SELECT * from eraons_pdf";
        $command = $connection->createCommand($sql);
        $data = $command->queryOne();
        return $data;
    }

    public function countbadget($bid, $id, $center, $zone) {
        $connection = \Yii::$app->db;
        $sql = "SELECT id from sewadar WHERE budget_number = '$bid' && center = '$center' && zone = '$zone' && id != $id";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    ////////////student class data ///////////
    public function Studentclasslist() {
        $connection = \Yii::$app->db;
        $sql = "SELECT id,class_name FROM `student_class` WHERE `is_active` = '1' order by class_name ASC";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    //////////////plan data//////////////////////////
    public function Planlist() {
        $connection = \Yii::$app->db;
        $sql = "SELECT id,name FROM `plan` WHERE `is_active` = '1' order by name ASC";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }

    //////////////Subject data//////////////////////////
    public function Subjectlist() {
        $connection = \Yii::$app->db;
        $sql = "SELECT id,sub_name FROM `subject` WHERE `is_active` = '1' order by sub_name ASC";
        $command = $connection->createCommand($sql);
        $data = $command->queryAll();
        return $data;
    }
}

?>