<?php

namespace frontend\controllers;

use Yii;
use common\models\HotelName;
use common\models\HotelNameSearch;
use common\models\Hotels;
//
use common\models\Destination;
use common\models\Utility;
use common\models\User;
//
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelNameController implements the CRUD actions for HotelName model.
 */
class HotelNameController extends Controller {

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
     * Lists all HotelName models.
     * @return mixed
     */
    public function actionIndex() {
        $model = new Destination();
        $mdl = new Hotels();
        $hotels = $mdl->gethotels();

        $id = $this->_userid;
        $modeldata = new User();
        $userdata = $modeldata->Useradmin($id);
        if (!empty($userdata)) {
            if ($userdata['user_type'] == 'superadmin') {
                $id = '';
                $data = $model->hotellistindex($id);
            } else {
                $data = $model->hotellistindex($id);
            }
            $destinationdata = $model->destinationlist();
        }

        return $this->render('index', [
                    'data' => $data,
                    'hotels' => $hotels
        ]);
    }

    /**
     * Displays a single HotelName model.
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
     * Creates a new HotelName model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $userid = $this->_userid;
        $model = new HotelName();
        $model1 = new Hotels();
        $hotels = $model1->gethotels();
        $destinationmodel = new Destination();
        $data = $destinationmodel->destinationlist();
        $users = $destinationmodel->userlist();
        $post = Yii::$app->request->post();
        if (!empty($post)) {

            for ($i = 0; $i < count($post['destination_id']); $i++) {
                $model = new HotelName();
                $model->destination_id = $post['destination_id'][$i];
                $model->hotel_name = $post['hotel_name'][$i];
                $model->location = $post['location'][$i];
                $model->breakfast = $post['breakfast'][$i];
                $model->lunch = $post['lunch'][$i];
                $model->dinner = $post['dinner'][$i];
                $model->extra_bed = $post['extra_bed'][$i];
                $model->no_of_rooms = $post['no_of_rooms'][$i];
                $model->is_active = $post['is_active'][$i];
                $model->user_id = $userid;
                $model->save();
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
                    'data' => $data,
                    'users' => $users,
                    'hotels' => $hotels
        ]);
    }

    /**
     * Updates an existing HotelName model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {


        $model = new Destination();
        $data = $model->hoteleditlist($id);
        $destinationmodel = new Destination();
        $destinationlist = $destinationmodel->destinationlist();
        $model1 = new Hotels();
        $hotels = $model1->gethotels();

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            for ($i = 0; $i < count($post['hotel_id']); $i++) {
                $id = $post['hotel_id'][$i];
                if ($id >= '1') {
                    $mdl = $this->findModel($id);
                } else {
                    $mdl = new HotelName();
                }
                $mdl->destination_id = $post['destination_id'][$i];
                $mdl->location = $post['location'][$i];
                $mdl->breakfast = $post['breakfast'][$i];
                $mdl->lunch = $post['lunch'][$i];
                $mdl->dinner = $post['dinner'][$i];
                $mdl->extra_bed = $post['extra_bed'][$i];
                $mdl->no_of_rooms = $post['no_of_rooms'][$i];
                $mdl->is_active = $post['is_active'][$i];
                $mdl->save();
            }


            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
                    'data' => $data,
                    'destinationlist' => $destinationlist,
                    'hotels' => $hotels
        ]);
    }

    public function actionDeletehotel() {

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $id = $post['hotelid'];

            $this->findModel($id)->delete();
            return true;
        }
    }

    /**
     * Deletes an existing HotelName model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the HotelName model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HotelName the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = HotelName::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
