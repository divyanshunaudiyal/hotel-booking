<?php

namespace frontend\controllers;

use Yii;
use common\models\HotelName;
use common\models\Booking;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//
use common\models\Destination;
use common\models\Utility;
use common\models\User;
use common\models\Roomtype;
use common\models\Roomdetails;
use common\models\Rooms;

//

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller {

    /**
     * {@inheritdoc}
     */
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
            $this->view->params['user_info'] = $user_info;
            $this->layout = 'user';

            return $this->_userid;
        }
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex() {
        $userid = $this->_userid;
        $model = new Booking();
        $data = $model->bookingdetails();
        $mdl = new Roomdetails();
        $roomdetails = $mdl->roomdetails();
        $user = new User();
        $userdata = $user->userlist();
        $userdetails = $user->userdetails($userid);

        return $this->render('index', [
                    'data' => $data,
                    'roomdetails' => $roomdetails,
                    'userdata' => $userdata,
                    'userdetails' => $userdetails
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        $id = $this->_userid;
        $model = new Booking();
        $model1 = new Destination();
        $destination = $model1->destinationlist();
        $user = new User();
        $userdata = $user->Useradmin($id);
        $usertype = $userdata['user_type'];
        if ($userdata['user_type'] == 'superadmin') {
            $userdata = $user->userlist();
        }
        $model2 = new Roomtype();
        $roomtype = $model2->roomtypedetails();
        $model3 = new Rooms();
        $allroomdata = $model3->roomsdetails();
        $post = Yii::$app->request->post();
        if (!empty($post)) {

            $model->user_id = $post['location'];
            $model->hotelname_id = $post['hotel_name'];
            $model->customer_name = $post['Booking']['customer_name'];
            $model->customer_number = $post['Booking']['customer_number'];
            $model->from_date = $post['from_date'];
            $model->to_date = $post['to_date'];
            $model->adult = $post['adult'];
            $model->plan = $post['plan'];
            $model->advance_amount = $post['Booking']['advance_amount'];
            $model->payment_mode = $post['payment_mode'];
            $model->total_amount = $post['total_amount'];
            $model->no_of_rooms = $post['no_of_rooms'];
            $model->room_id = $post['room_id'];
            $model->extra_bed = $post['extra_bed'];
            $model->save();

            for ($i = 0; $i < count($post['room_id']); $i++) {
                $mdl = new Roomdetails();
                $mdl->room_type = $post['room_id'][$i];
                $mdl->no_of_rooms = $post['no_of_rooms'][$i];
                $mdl->booking_id = $model->id;
                $mdl->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('create', [
                    'model' => $model,
                    'destination' => $destination,
                    'userdata' => $userdata,
                    'roomtype' => $roomtype,
                    'allroomdata' => $allroomdata,
                    'usertype' => $usertype
        ]);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $userid = $this->_userid;

        $model = $this->findModel($id);
        $model1 = new Destination();
        $user = new User();
        $modelbooking = new Booking();
        $model2 = new Roomtype();
        $model3 = new Roomdetails();

        $destination = $model1->destinationlist();
        $userdata = $user->Useradmin($userid);
        $usertype = $userdata['user_type'];
        if ($userdata['user_type'] == 'superadmin') {
            $userdata = $user->userlist();
        }

        $bookingdata = $modelbooking->bookingdetails();
        $roomtype = $model2->roomtypedetails();
        $data = $modelbooking->gethotelname($model->user_id);
        $bookingroomdetails = $model3->bookingroomdetails($id);
        $post = Yii::$app->request->post();
        if (!empty($post)) {

            $model->user_id = $post['location'];
            $model->hotelname_id = $post['hotel_name'];
            $model->customer_name = $post['Booking']['customer_name'];
            $model->customer_number = $post['Booking']['customer_number'];
            $model->from_date = $post['from_date'];
            $model->to_date = $post['to_date'];
            $model->adult = $post['adult'];
            $model->plan = $post['plan'];
            $model->no_of_rooms = $post['no_of_rooms'];
            $model->advance_amount = $post['Booking']['advance_amount'];
            $model->payment_mode = $post['payment_mode'];
            $model->total_amount = $post['total_amount'];
            $model->extra_bed = $post['extra_bed'];
            $model->save();

            return $this->redirect(['index']);
        }
        return $this->render('update', [
                    'model' => $model,
                    'userdata' => $userdata,
                    'destination' => $destination,
                    'data' => $data,
                    'roomtype' => $roomtype,
                    'bookingdata' => $bookingdata,
                    'usertype' => $usertype,
                    'bookingroomdetails' => $bookingroomdetails
        ]);
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionGethoteldata() {
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $id = $post['hotelid'];
            $model = new Booking();
            $data = $model->gethotelname($id);
            $html = '';
            if (!empty($data)) {
                foreach ($data as $value) {
                    $html .= "<option value='" . $value['id'] . "'>" . $value['location'] . "</option>";
                }
            }
            return $html;
        }
    }


    public function actionFilterhoteldata() {
        $post = Yii::$app->request->post();

        if (!empty($post)) {
            $location = $post['location'];
            $date = $post['date'];

            if ($location && $date) {
                
            }
            $model = new Booking();
            $data = $model->filteredhoteldetails($location, $date);

            $html = '';
            if (!empty($data)) {
                $i = 1;
                foreach ($data as $val) {
                    $html .= '<tr>
            <td>' . $val['customer_name'] . '</td>
            <td>' . $val['customer_number'] . '</td>
            <td>' . $val['from_date'] . '</td>
            <td>' . $val['to_date'] . '</td>
            <td>' . $val['adult'] . '</td>
            <td>' . $val['children'] . '</td>
            <td>' . $val['advance_amount'] . '</td>
            <td>' . $val['total_amount'] . '</td>
            <td>' . $val['payment_mode'] . '</td>
            
            <td style="text-align: center;">
                <a href="' . BASE_URL . 'booking/update?id=' . $val['id'] . '" title="Edit"><button type="button" class="btn btn-success">Edit</button></a>
                <a href="' . BASE_URL . 'booking/delete?id=' . $val['id'] . '" title="Delete"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
        </tr>';
                }
            } else {
                $html .= '<tr><td colspan="12" class="text-center">no record found</td></tr>';
            }
            return $html;
        }
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEnquireindex() {
        $userid = $this->_userid;
        $model = new Booking();
        $data = $model->bookingdetails();
        $user = new User();
        $userdata = $user->userlist();
        $userdetails = $user->userdetails($userid);
        $model2 = new Rooms();
        $model3 = new Roomdetails();
        $model4 = new Roomtype();
        $roomtype = $model4->roomtypedetails();
        $bookedroomdetails = $roomdetails = $hoteldata = null;
        $post = Yii::$app->request->post();
        $roomsbooked = $availablerooms = [];
        $html = '';
        $final = [];

        if (!empty($post)) {
            $location = $post['location'];
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
        return $this->render('enquireindex', [
                    'data' => $data,
                    'userdata' => $userdata,
                    'userdetails' => $userdetails,
                    'roomdetails' => $roomdetails,
                    'hoteldata' => $hoteldata,
                    'roomtype' => $roomtype,
                    'final' => $final
        ]);
    }

//    public function actionCheckavailablerooms() {
//        $post = Yii::$app->request->post();
//
//        if (!empty($post)) {
//            $fromdate = $post['fromdate'];
//            $todate = $post['todate'];
//            $roomtypeid = $post['roomtypeid'];
//            $location = $post['location'];
//            $model = new Booking();
//            $data = $model->checkrooms($fromdate, $todate, $roomtypeid, $location);
//
//            $totalrooms = null;
//            $roomsbooked = 0;
//            if (!empty($data)) {
//                foreach ($data as $val) {
//                    $roomsbooked += $val['no_of_rooms'];
//                    $totalrooms = $val['total_rooms'];
//                }
//            } else if (empty($data)) {
////                echo 66;die;
//
//                $data = $model->getrooms($location, $roomtypeid);
//                $totalrooms = $data['total_rooms'];
//                $roomsbooked = 0;
//            }
//            $availablerooms = $totalrooms > $roomsbooked ? $totalrooms - $roomsbooked : 0;
//            // Format the response as JSON string
//            $response = json_encode(['roomsbooked' => $roomsbooked, 'availablerooms' => $availablerooms]);
//            // Return the response string
//            return $response;
//        }
//    }



    public function actionCalculatetotalprice() {
        $post = Yii::$app->request->post();
        if (!empty($post)) {

            $location = $post['location'];
            $fromdate = $post['fromdate'];
            $todate = $post['todate'];
            $adults = $post['adults'];
            $plan = $post['plan'];
            $no_of_rooms = $post['noofroomsvalues'];
            $roomid = $post['roomidvalues'];
            $extra_bed = $post['extrabed'];
            $days = $post['days'];
            $model = new Booking();
            $model1 = new HotelName();
            $foodprice = $model1->hotelfoodprice($location);
            $breakfast = $foodprice['breakfast'];
            $dinner = $foodprice['dinner'];
 
            $data = $model->extrabedprice($location);
            $extrabedprice = $data['extra_bed'];
            $perperson = 0;
            $food = 0;
            
            if($plan == 'EP'){
                $food = 0;
            }
            else if($plan == 'CP'){
                $food = $breakfast;
            }
            else if($plan == 'MAP'){
                $food = $breakfast + $dinner;
            }
            
            $totalprice = 0;
            if ($location && $fromdate && $todate && $no_of_rooms && $roomid) {
                for ($i = 0; $i < count($no_of_rooms); $i++) {
                    $roomprice = (float) $model->roomprice($location, $roomid[$i]);
                    $price = $no_of_rooms[$i] * $roomprice;
                    $totalprice += $price;
                }
            }
            $totalprice *= $days; //multiply total by no of days of booking
            $totalprice += $adults * $food; //add food price per plan
            if ($extra_bed) {
                $totalprice += $extra_bed * ($extrabedprice + $food);
            }
            echo $totalprice;
            die;
        }
    }
}
