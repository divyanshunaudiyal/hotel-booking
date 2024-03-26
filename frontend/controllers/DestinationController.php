<?php

namespace frontend\controllers;

use Yii;
use common\models\Destination;
use common\models\Utility;
use common\models\User;
use common\models\DestinationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DestinationController implements the CRUD actions for Destination model.
 */
class DestinationController extends Controller
{
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

    public function behaviors()
    {
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
     * Lists all Destination models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Destination();
        $data = $model->destinationlist();
        return $this->render('index', [
            'data' => $data
           
        ]);
    }

    /**
     * Displays a single Destination model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Destination model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Destination();

        $post = Yii::$app->request->post();
        
        if(!empty($post)){
            $model->destination_name = $post['Destination']['destination_name'];   
            $model->is_active = $post['Destination']['is_active'];
            $model->save();
            return $this->redirect(BASE_URL.'destination-list');

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Destination model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();
        
        if(!empty($post)){
            $model->destination_name = $post['Destination']['destination_name'];   
            $model->is_active = $post['Destination']['is_active'];
            $model->save();
            return $this->redirect(BASE_URL.'destination-list');

        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    
    
    /**
     * Deletes an existing Destination model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Destination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Destination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Destination::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
