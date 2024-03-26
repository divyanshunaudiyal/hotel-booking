<?php
use common\models\Utility;
try{
$getuserid	=	!empty($_COOKIE["uid"])	?	$_COOKIE["uid"]	:	0;
} catch (ErrorException $e) {
                $utility = new Utility();
              $utility->exceptionErrorDisplay($e);
              //dashboarderrorlog
             $this->redirect(BASE_URL . 'signin/loging');

            }
/******Cookie**********/
	    $utility = new Utility();
            if(!empty($getuserid))
            {
                $user_id = $utility->descriptionFormatforcookie($getuserid);
            }
	    /******Cookie**********/
?>
<?php	if	(!empty($user_id))	{	?>
		<input type="hidden" value='<?=	$user_id	?>' id='quickuserid'>
<?php	}	?>

<div class="page-content">
		
		<div class="page-header">

				<h1>
						<a href="<?=	BASE_URL	. 'investment' ?>" class="test"> <?= \Yii::t('invest_quick', 'Access'); ?></a>
						<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								<?=	\Yii::t('invest_quick',	'Permission')	?>

						</small>
				</h1>

</div>
		<div class="row">
				<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="alert alert-block alert-danger renderMessage">
									<?= \Yii::t('invest_quick', 'Your are not authorised user.'); ?>
								
						</div>
						<center>
<!--								<a href="</?=	BASE_URL	?>profile">
										<button class="btn btn-info" type="reset">
												<i class="ace-icon fa fa-check bigger-110"></i>
											<//?= \Yii::t('invest_quick', 'Go to Profile Builder.'); ?>
										</button>
								</a>
						</center>-->
				</div>
		</div>
</div>
