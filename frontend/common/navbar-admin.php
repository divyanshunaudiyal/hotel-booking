<?php
 //s use common\models\UserMandateHolder;
use common\models\User;
/* * ****Cookie********* */
use common\models\Utility;
    $curdatetime = date("Y-m-d H:i:s");
 if (isset($_SESSION['last_activity']) && ((strtotime($curdatetime) - strtotime($_SESSION['last_activity'])) > \Yii::$app->getSession()->timeout)) {
            \Yii::$app->getSession()->setFlash('user_status', 'Session Timeout');
            $utility = new Utility();
            $utility->Sessionexipary();
              // return BASE_URL . 'signin/loging';
        }else{
$utility = new Utility();
try {
    $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
    $user = new User();
    if (!empty(\Yii::$app->user->identity->id)) {
        $user_id = Yii::$app->user->identity->id;
    } else {
        $user_id = "";
    }
    if (!empty($user_id)) {
       // $getuserideantity = $user->getCurrentUrole($user_id);
        
        
        $action = Yii::$app->controller->action->id;
        $con = Yii::$app->controller->id;
    }

    $uID = $utility->encryptionFormatforcookie($user_id);
    //$uAccess = $utility->encryptionFormatforcookie($userAccessDesc);
    $uID_session = $utility->encryptionFormatforcookie($user_id);
    
} catch (ErrorException $e) {
    $utility = new Utility();
    $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
    $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
    if (!empty($getuserid) || empty($userAccess) || !empty($userAccess)) {
        $utility->exceptionErrorCookiesBeforeAction($e);
    }
    //dashboarderrorlog
   $utility = new Utility();
   $utility->Sessionexipary();
}

?>


<nav class="navbar-default navbar-static-side" role="navigation">
           
    <?php include(dirname(__FILE__) . "/../common/sidebar-admin.php"); ?>
        </nav>

    <?php } ?>



