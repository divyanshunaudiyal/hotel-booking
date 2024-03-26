<?php

namespace frontend\controllers;

use Yii;
use common\models\Rooms;
use common\models\RoomsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//
//
use common\models\Utility;
use common\models\User;
use common\models\Destination;
use common\models\Roomtype;

//

/**
 * RoomsController implements the CRUD actions for Rooms model.
 */
class RoomsController extends Controller {

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
     * Lists all Rooms models.
     * @return mixed
     */
    public function actionIndex() {
        $id = $this->_userid;
        $modeldata = new User();
        $userdata = $modeldata->Useradmin($id);
        $model2 = new Roomtype();
        $roomtype = $model2->roomtypedetails();
        $model = new Rooms();
        $data = $model->roomslist($id, $userdata['user_type']);
        return $this->render('index', [
                    'data' => $data,
                    'roomtype' => $roomtype
        ]);
    }

    /**
     * Displays a single Rooms model.
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
     * Creates a new Rooms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $id = $this->_userid;
        $model = new Rooms();
        $model1 = new User();
        $userdata = $model1->Useradmin($id);
        if ($userdata['user_type'] == 'superadmin') {
            $data = $model->allhotellist();
        } else {
            $data = $model->hotellist($id);
        }
        $model2 = new Roomtype();
        $roomtype = $model2->roomtypedetails();
//        echo "<pre>";print_r($roomtype);die;
        $post = Yii::$app->request->post();
        if (!empty($post)) {
//           echo "<pre>";print_r($post);die;
            for ($i = 0;
                    $i < count($post['hotelname_id']);
                    $i++) {
                        $mdl = new Rooms();
                        
                $mdl->hotelname_id = $post['hotelname_id'][$i];
                $mdl->room_type = $post['room_type'][$i];
                $mdl->price = $post['Rooms']['price'][$i];
                $mdl->total_rooms = $post['Rooms']['total_rooms'][$i];
                $mdl->is_active = $post['Rooms']['is_active'][$i];
                $mdl->save();
            }
                return $this->redirect(['index']);

        }
        return $this->render('create', [
                    'model' => $model,
                    'data' => $data,
                    'roomtype' => $roomtype
        ]);
    }

    /**
     * Updates an existing Rooms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = new Rooms();
        $model1 = new Rooms();
        $data = NULL;
        $model2 = new Roomtype();
        $roomlist = NULL;
        $roomtype = $model2->roomtypedetails();
        $userid = $this->_userid; //pass hotelname id from rooms  rather than userid
        $modeldata = new User();
        $userdata = $modeldata->Useradmin($userid);
        if (!empty($userdata)) {
            if ($userdata['user_type'] == 'superadmin') {
                $userid = '';
                $roomlist = $model->specifichotelroomlist($id); 
                $data = $model1->hotellist($userid);
            } else {
                $roomlist = $model->specifichotelroomlist($id); 
                $data = $model1->hotellist($userid);
            }
        }
        $post = Yii::$app->request->post();
        if (!empty($post)) {
//                         echo "<pre>";print_r($post);die;
            for ($i = 0;
                    $i < count($post['room_id']);
                    $i++) {
                $id = $post['room_id'][$i];
                if ($id >= '1') {
                    $mdl = $this->findModel($id);
                } else {
                    $mdl = new Rooms();
                }
                $mdl->hotelname_id = $post['hotelname_id'][$i];
                $mdl->room_type = $post['room_type'][$i];
                $mdl->price = $post['price'][$i];
                $mdl->total_rooms = $post['total_rooms'][$i];
                $mdl->is_active = $post['Rooms']['is_active'][$i];
                $mdl->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('update', [
                    'model' => $model,
                    'data' => $data,
                    'roomlist' => $roomlist,
                    'roomtype' => $roomtype
        ]);
    }

    /**
     * Deletes an existing Rooms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
         
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteroom() {

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $id = $post['roomid'];
            $this->findModel($id)->delete();
            return true;
        }
    }

    /**
     * Finds the Rooms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rooms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Rooms::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
