<?php /**
 * @Author         : Ali
 * @Last modified  : 07, Feb 2017
 *
 * @Project        : pmsaif Tech
 * @Function       : Boot Strap Message
 * @Description    : 
 * @Parameters     : 
 * @Method         :
 *
 * @Returns        : 
 * @Return Type    : 
 */
use yii\web\NotFoundHttpException;
use yii\base\ErrorException;
use common\models\Utility;
       
?>
<?php try { ?>
<script>
    //Added code from BootStap
   
    var timerOutOTP = "<?= $GLOBALS['messages']['userRegistration']['timerOutOTP'] ?>";
    var oneTimeOtpSendMessage = "<?= $GLOBALS['messages']['userRegistration']['oneTimeOtpSendMessage'] ?>";
      var requiredOtp = "<?= $GLOBALS['messages']['userRegistration']['requiredOtp'] ?>";
    
 //End code for bootstrap
</script>
<?php }
catch (ErrorException $e) {
              $utility = new Utility();
              $utility->exceptionErrorDisplay($e);
                $utility = new Utility();
               $utility->Sessionexipary();
           // throw new NotFoundHttpException();
        }?>