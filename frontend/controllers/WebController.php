<?php

namespace frontend\controllers;

use Yii;
use common\models\Destination;
use common\models\DestinationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use common\models\Utility;
use common\models\States;

/**
 * DestinationController implements the CRUD actions for Destination model.
 */
class WebController extends Controller {

    public $enableCsrfValidation = false;
    public $_userid = NULL;
    public $_username = null;

    public function beforeAction($action) {
        date_default_timezone_set('Asia/Calcutta');
        session_start();
        $this->layout = 'web';
        return true;
    }

    /**
     * Lists all Destination models.
     * @return mixed
     */
    public function actionHotelsearch() {
        return $this->render('hotels-filter',[
            
        ]);
    }

    /**
     * Finds the Destination model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Destination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Destination::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
