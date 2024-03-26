<?php

namespace frontend\controllers;

use Yii;
use yii\base\ErrorException;
use yii\helpers\ArrayHelper;
use common\models\Utility;
use yii\web\NotFoundHttpException;
use common\helpers\Common;
use common\models\User;
use common\models\HotelName;
use common\models\Rooms;
use common\models\Roomdetails;
use common\models\Roomtype;
use common\models\Booking;
use common\models\Centers;
use common\models\Zone;
use common\models\Loghistory;
use \Mpdf\Mpdf;

class UserController extends \yii\web\Controller {

    public $enableCsrfValidation = false;
    public $_userid = NULL;
    public $_username = null;

    public function beforeAction($action) {
        date_default_timezone_set('Asia/Calcutta');
        session_start();

        $utility = new Utility();
        try {
            $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
        } catch (ErrorException $e) {
            $utility = new Utility();
            $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
            $this->redirect(BASE_URL . 'loging');
        }

        if (!empty($getuserid)) {
            //  $this->_userid = $utility->descriptionFormatforcookie($getuserid);
            $this->_userid = $getuserid;
        }
        $curdatetime = date("Y-m-d H:i:s");
        if (empty($this->_userid) || empty($_SESSION) || (empty($_SESSION['last_activity']) && ((strtotime($curdatetime) - strtotime($_SESSION['last_activity'])) > \Yii::$app->getSession()->timeout))) {
            \Yii::$app->getSession()->setFlash('user_status', 'Session Timeout');
            $this->redirect(BASE_URL . 'loging');
        } else {

            $utility = new Utility();
            $user = new User();
            $user_id = $this->_userid;

            try {
                $this->_username = Yii::$app->user->identity->username;
            } catch (ErrorException $e) {
                $this->_username = '';
            }
            $user_info = $user->getUserInfo($this->_userid);

            // if ($user_info['id'] == 2) {
            //$plan = $utility->planUpdate($this->_userid, $this->_username);
            // }
            $this->view->params['user_info'] = $user_info;
            $this->layout = 'user';

            return $this->_userid;
        }
    }

    public function actionIndex() {

        $user = new User();
        $userdata = $user->UserList();
        return $this->render('index', [
                    'userdata' => $userdata
        ]);
    }

    public function actionInvoice() {
        $model = new User();
        $eraonspdf = $model->Eraonspdf();
        $html = $this->renderPartial('/admin/invioces', [
            'eraonspdf' => $eraonspdf
        ]);
//        echo $html;
//        die;

        $mpdf = new mPDF();
        $mpdf->WriteHTML($html);
        $mpdf->Output('eraons.pdf', 'D');
    }

    public function actionGetsetuserenrypted() {
        $getValEncrypt = Yii::$app->request->post();
        $getEncVal = $getValEncrypt['id'];
        $utility = new Utility();
        if (!empty($getEncVal)) {
            $id = $getEncVal;
            if (!empty(encryptAdminRole)) {
                $defBootAdminRole = encryptAdminRole;
            }
            if (!empty(encryptInvestorsRole)) {
                $defBootInvestorsRole = encryptInvestorsRole;
            }
            setcookie('uid', $id, time() + 3600, '/');

            echo "1";
            exit;
        } else {
            return false;
        }
    }

    public function actionCreate() {
        $model = new User();
        $post = Yii::$app->request->post();

//        echo "<pre>";print_r($_FILES);die;

        if (!empty($post)) {

            if (!empty($_FILES)) {
                $imgaddress = $this->imagesave($_FILES);
            }

            $model->username = $post['User']['username'];
            $model->email = $post['User']['email'];
            $model->status = $post['User']['status'];
            $model->password_hash = $post['User']['password_hash'];
            $model->setPassword($model->password_hash);
            $model->user_type = $post['User']['user_type'];
            $model->mobile = $post['User']['mobile'];
            $model->hotel_name = $post['User']['hotel_name'];
            if (!empty($imgaddress['image'])) {
                $model->user_image = $imgaddress['image'];
            }
            $model->save();

            //loghistory start
            $model1 = new Loghistory();
            $data = $model1->data($this->_userid);
            if (!empty($data)) {
                $model1->user_id = $this->_userid;
                $model1->log_details = "CREATED USER";
                $model1->save();
            }
            //loghistory end
            $this->redirect(BASE_URL . 'user-list');
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function Imagesave($file) {


        $errors = $errors1 = '';
        $file_name = $file['user_image']['name'];
        $file_size = $file['user_image']['size'];
        $file_tmp = $file['user_image']['tmp_name'];
        $file_type = $file['user_image']['type'];

        if (!empty($file_name)) {
            $ext = '';
            if (!empty($file_name)) {
                $ext = explode('.', $file_name);
            }
            if (!empty($ext)) {
                $file_ext = $ext['1'];
            } else {
                return;
            }
            $errors = '';
            $file_ext = strtolower($file_ext);
            $extensions = array("jpeg", "jpg", "png", "pdf");
            if ($file_size > 50042880) {
                $errors = 'File size must be excately 10 MB';
            }
            $min_rand = rand(0, 100);
            $max_rand = rand(0, 1000);
            $name_file = rand($min_rand, $max_rand) . time();
            $file_name_final = $name_file . "." . $file_ext;
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "../web/static/images/user_image/" . $file_name_final);
                $file_name_array['error'] = '';
            } else {
                // print_r($errors);
                $file_name_array['error'] = $errors;
            }
            $file_name_array['image'] = $file_name_final;
        } else {
            $file_name_array['image'] = '';
            $file_name_array['error'] = '';
        }



        return $file_name_array;
    }

    public function actionUserlist() {
        $model = new User();
        $userlist = $model->UserList();
        return $this->render('userlist', [
                    'userlist' => $userlist,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(BASE_URL . 'user-list');
    }

    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        // echo '<pre>';print_r($post);die;
        if (!empty($post)) {

            if (!empty($_FILES)) {
                $imgaddress = $this->imagesave($_FILES);
            }

            $model->username = $post['User']['username'];
            $model->email = $post['User']['email'];
            $model->status = $post['User']['status'];
            $model->user_type = $post['User']['user_type'];
            $model->mobile = $post['User']['mobile'];
            $model->hotel_name = $post['User']['hotel_name'];
            if (!empty($imgaddress['image'])) {
                $model->user_image = $imgaddress['image'];
            }
            $model->save();
            //loghistory start
            $model1 = new Loghistory();
            $data = $model1->data($this->_userid);
            if (!empty($data)) {
                $model1->user_id = $this->_userid;
                $model1->log_details = "UPDATED USER";
                $model1->save();
            }
            //loghistory end
            $this->redirect(BASE_URL . 'user-list');
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    public function actionSetting() {
        $post = Yii::$app->request->post();
        $msg = '';
        if (!empty($post)) {
            $pass = $post['password'];
            $connpass = $post['connpassword'];
            if ($pass != $connpass) {
                $msg = 'Password and confirm password not matched';
            } else {
                $userid = $this->_userid;
                $model = $this->findModel($userid);
                $hash = Yii::$app->getSecurity()->generatePasswordHash($post['password']);
                $model->password_hash = $hash;
                $model->save();
                $msg = 'Password changed successfully';
            }
        }
        return $this->render('change-password', [
                    'msg' => $msg,
        ]);
    }

    public function actionDashboard() {
        $userid = $this->_userid;

        $user = new User();
        $hotel_id = 0;
        $model1 = new Booking();

        $userdata = $user->Useradmin($userid);

        $hotellist = $model1->gethotelname($userid);
        if (!empty($hotellist)) {
            $hotel_id = $hotellist[0]['id'];
        }
//        echo "<pre>";print_r($hotellist);die;
        $usertype = $userdata['user_type'];
        if ($userdata['user_type'] == 'superadmin') {
            $userdata = $user->userlist();
        }
        $enddate = '';
        $currentdate = date('Y-m-d');
        $first_date = date('Y-m-01');
        $last_date = date('Y-m-t');
        $todayamount = $model1->sumbookings($hotel_id, $currentdate, $currentdate);
        $monthamount = $model1->sumbookings($hotel_id, $first_date, $last_date);
        $totalamount = $model1->sumbookings($hotel_id);
        $limit = 10;
        $offset = 0;
        $upcomingbooking = $model1->upcomingbookings($offset, $limit, $hotel_id);

        return $this->render('dashboard', [
                    'userdata' => $userdata,
                    'usertype' => $usertype,
                    'todayamount' => $todayamount,
                    'monthamount' => $monthamount,
                    'totalamount' => $totalamount,
                    'hotellist' => $hotellist,
                    'upcomingbooking' => $upcomingbooking,
            'userid' => $userid
        ]);
    }

    public function actionIncreaselimit() {
        $post = $post = Yii::$app->request->post();
        $html = "";
        if (!empty($post)) {
            $limit = $post['limit'];
            $offset = $post['offset'];
            $hotelid = $post['hotelid'];
            $model = new Booking();
            $upcomingbooking = $model->upcomingbookings($offset, $limit,$hotelid);

            if (!empty($upcomingbooking)) {

                foreach ($upcomingbooking as $val) {
                    $html .= '<tr>
                    <td>' . $val['customer_name'] . '</td>
                    <td>' . $val['customer_number'] . '</td>
                    <td>' . $val['from_date'] . '</td>
                    <td>' . $val['to_date'] . '</td>
                    <td>' . $val['adult'] . '</td>
                    <td>' . $val['advance_amount'] . '</td>
                    <td>' . $val['total_amount'] . '</td>
                </tr>';
                }
            }
        }
        return $html;
    }

    public function actionGetdetailsofdate() {
        $post = Yii::$app->request->post();
        $model = new Booking();
        $model2 = new Rooms();
        $model3 = new Roomdetails();
        $model4 = new Roomtype();
        $html = '';
        $final = [];

        if (!empty($post)) {
            $location = $post['hotelname'];
            $date = $post['date'];
            $allhotelrooms = $model2->enquirydatalist($location);

            $hoteldata = $model->filteredhoteldetails($location, $date);
            if (!empty($allhotelrooms)) {

                foreach ($allhotelrooms as $rooms) {
                    $temp = array();
                    $hotelid = $rooms['hotelname_id'];
                    $roomid = $rooms['id'];
                    $hotelroomdetails = $model3->hotelroomdetails($hotelid, $date, $roomid); //count booked rooms
                    $totalrooms = $model2->enquireroomdetails($hotelid, $roomid);
                    $temp['room_type'] = $rooms['room_type'] . " " . $rooms['room_name'];
                    $temp['total_rooms'] = $totalrooms['total_rooms'];
                    $temp['booked_rooms'] = $hotelroomdetails['booked_room'];
                    $temp['available_rooms'] = $totalrooms['total_rooms'] - $hotelroomdetails['booked_room'];
                    $final[] = $temp;
                }
            }
        }

        $html .= '
    <div class="col-lg-6">
        <div class="ibox">
            <div class="ibox-title" style="display:flex; justify-content: space-between;">
                <div>
                    <span class="label label-primary float-right" style="background:green;">Available</span>
                    <h5>Rooms</h5>
                </div>
            </div>
            <div class="ibox-content">';

        foreach ($final as $val) {
            $html .= '<div style="display:flex; justify-content: space-between;text-transform:capitalize; border-bottom:0.25px solid grey;margin-top:5px;">
                <span>' . $val['room_type'] . '</span> 
                <span>' . $val['available_rooms'] . '</span>
               </div>';
        }

        $html .= '
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox">
            <div class="ibox-title" style="display:flex; justify-content: space-between; ">
                <div>
                    <span class="label label-primary float-right" style="background:black;">Booked</span>
                    <h5>Rooms</h5>
                </div>
            </div>
            <div class="ibox-content">';

        foreach ($final as $val) {
            $html .= '<div style="display:flex; justify-content: space-between;text-transform:capitalize;border-bottom:0.25px solid grey; margin-top:5px;">
                <span>' . $val['room_type'] . '</span>
                <span>' . ($val['booked_rooms'] ? $val['booked_rooms'] : '0') . '</span>
              </div>';
        }


        $html .= '
            </div>
        </div>
    </div>';

        echo $html;
    }

    public function actionNextbookings() {
        $post = Yii::$app->request->post();
        $hotel_id = 0;
        $model1 = new Booking();
        $html = '';

        if (!empty($post)) {
            $hotel_id = $post['hotelid'];
            $limit = 10;
            $offset = 0;
            $upcomingbooking = $model1->upcomingbookings($offset, $limit, $hotel_id);

            foreach ($upcomingbooking as $val) {
               $html .= "<tr>
                <td>" . $val['customer_name'] . "</td>
                <td>" . $val['customer_number'] . "</td>
                <td>" . $val['from_date'] . "</td>
                <td>" . $val['to_date'] . "</td>
                <td>" . $val['adult'] . "</td>
                <td>" . $val['advance_amount'] . "</td>
                <td>" . $val['total_amount'] . "</td>
            </tr>";
            }
        }
            return $html;

    }

//end
    }
    