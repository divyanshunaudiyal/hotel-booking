
<?php

use common\models\UserMandateHolder;
use common\models\Utility;
use common\models\User;
use common\models\Useradvisorymap;

/* * ****Cookie********* */
$utility = new Utility();
/* * ****Cookie********* */
try {
    $getuserid = !empty($_COOKIE['uid']) ? $_COOKIE['uid'] : 0;
    $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
} catch (ErrorException $e) {
    $utility = new Utility();
    $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
    $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
    if (!empty($getuserid) || empty($userAccess) || !empty($userAccess)) {
        $utility->exceptionErrorCookiesBeforeAction($e);
    }
    //dashboarderrorlog
    // $this->redirect(BASE_URL . 'signin/loging');
    $utility = new Utility();
    $utility->Sessionexipary();
}
if (!empty($getuserid)) {
    $userid = $utility->descriptionFormatforcookie($getuserid);
}
/* * ****Cookie********* */

if (!empty($userAccess)) {
    $userAccessDesc = $utility->descriptionFormat($userAccess);
}
if (!empty(encryptAdminRole)) {
    $defBootAdminRole = $utility->descriptionFormat(encryptAdminRole);
}

/* * ****Cookie********* */
$action = "dashboard";
if (!empty($this->params['page_header_info']['action'])) {
    $action = $this->params['page_header_info']['action'];
}
if (!empty($this->params['user_info']['name'])) {
    $name = $this->params['user_info']['name'];
} else if ($this->params['user_info']['primary_email']) {
    $name = $this->params['user_info']['primary_email'];
} else if ($this->params['user_info']['primary_mobile_number']) {
    $name = $this->params['user_info']['primary_mobile_number'];
}
\Yii::$app->language = !empty($_COOKIE["language"]) ? $_COOKIE["language"] : 'en';
?>


<?php
/* * ********************** Kuldeep KD Bagwari ***************************** */
$id = $userid;
$readonly = '';
$disabled = '';
$invest_in_pmsaif = UserMandateHolder::find()->select(['invest_in_pmsaif'])->where(['user_id' => $id])->asArray()->one();
if (count($invest_in_pmsaif) > 0 && $userAccessDesc != $defBootAdminRole) {
    $readonly = 'readonly';
    $disabled = 'disabled';
}

/* $userU = new User();
  $useradvisoryPdf = $userU->Advisroyplanbuydetails($user_id);
  $modelU = new Useradvisorymap();
  $useradvisorymap = $modelU->advisoryParentid($user_id); */
/* * *************************** Kuldeep KD Bagwari ***************************** */
?>

<div class="widget-header">

    <?php if ($action == 'wealthaction') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li class="active">
                    <a href="<?= BASE_URL ?>wealth-action">WealthSimple Purchase </a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealth-redeem">WealthSimple Redeem</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealth-rebalance">WealthSimple Rebalance </a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealthsimple-report">WealthSimple Transaction Report </a>
                </li>
            </ul>
        </div>
        <?php ?>
    <?php } else if ($action == 'wealthsimpleadmin') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li >
                    <a href="<?= BASE_URL ?>wealth-action">WealthSimple Purchase</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealth-redeem">WealthSimple Redeem</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealth-rebalance">WealthSimple Rebalance </a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>wealthsimple-report">WealthSimple Transaction Report </a>
                </li>
            </ul>
        </div>
    <?php } else if ($action == 'wealthactionredeem') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li >
                    <a href="<?= BASE_URL ?>wealth-action">WealthSimple Purchase</a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>wealth-redeem">WealthSimple Redeem </a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>wealth-rebalance">WealthSimple Rebalance </a>
                </li>
                <li >
                    <a href="<?= BASE_URL ?>wealthsimple-report">WealthSimple Transaction Report </a>
                </li>
            </ul>
        </div>
     <?php } else if ($action == 'wealthrebalance') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li >
                    <a href="<?= BASE_URL ?>wealth-action">WealthSimple Purchase</a>
                </li>
                <li >
                    <a href="<?= BASE_URL ?>wealth-redeem">WealthSimple Redeem </a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>wealth-rebalance">WealthSimple Rebalance </a>
                </li>
                <li >
                    <a href="<?= BASE_URL ?>wealthsimple-report">WealthSimple Transaction Report </a>
                </li>
            </ul>
        </div>
    <?php } else if ($action == 'sipplus') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li class="active">
                    <a href="<?= BASE_URL ?>sip-plusreport">SIP+ Regular Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport-auto">SIP+ Increment Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>execution-report">SIP+ Regular Execution</a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>execution-sip-auto">SIP+ Increment Execution</a>
                </li>
            </ul>
        </div>
        <?php ?>
    <?php } else if ($action == 'timeline') {
        ?>
        <h1>
            <?php if ($disabled == 'disabled') { ?>
                <?= \Yii::t('invest_quick', 'profile viewer'); ?>
            <?php } else {
                ?>
                <?= \Yii::t('invest_quick', 'Profile Builder'); ?>
            <?php } ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?= \Yii::t('invest_quick', 'Timeline'); ?>

            </small>
        </h1>

    <?php } else if ($action == 'currentportfolio' || $action == 'currentportfolioscheme' || $action == 'currentfolizerobalance' || $action == 'currentfolio') { ?>
        <div class="row">
            <div class="col-sm-9">
                <h1>
                    <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
                    </small>
                </h1>
                <div class="widget-toolbar no-border" style="float: left;" >
                    <ul class="nav nav-tabs" id="recent-tab">
                        <li style="background-color:#3a87ad!important; border: 2px solid; border-color: #fff;">
                            <a style="color: #fff;" href="<?= BASE_URL ?>schemecompare"><?= \Yii::t('invest_quick', 'Compare Scheme'); ?>
                                <i class=" ace-icon fa fa-exchange bigger-135"></i> 
                            </a>
                        </li>
                        <?php /*  <li style="background-color:#82af6f!important; border: 2px solid; border-color: #fff;">
                          <a style="color: #fff;" href="<?= BASE_URL ?>insight-score"><?= \Yii::t('invest_quick', 'Portfolio Check'); ?>
                          <i class="ace-icon fa fa-bar-chart-o bigger-135"></i>
                          </a>
                          </li> */ ?>


                        <li style="background-color:#d54c7e!important; border: 4px solid; border-color: #fff;">
                            <a style="color: #fff;" href="<?= BASE_URL ?>upload-statement-pdf"><?= \Yii::t('invest_quick', '&nbsp;&nbsp;Fix Holdings&nbsp;&nbsp;'); ?>
                                <i class="ace-icon fa fa-share bigger-135"></i> 
                            </a>
                        </li>


                       

                        <?php
                        $utility = new Utility();
                        try {
                            $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
                            $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
                        } catch (ErrorException $e) {
                            $utility = new Utility();
                            $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
                            $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
                            if (!empty($getuserid) || empty($userAccess) || !empty($userAccess)) {
                                $utility->exceptionErrorCookiesBeforeAction($e);
                            }
                            //dashboarderrorlog
                        }
                        if (!empty($userAccess)) {
                            $userAccessDesc = $utility->descriptionFormat($userAccess);
                        }
                        if (!empty(encryptAdminRole)) {
                            $defBootAdminRole = $utility->descriptionFormat(encryptAdminRole);
                        }
                        //if ($userAccessDesc == $defBootAdminRole) { 
                        if (1 == 1) {
                            ?>
                            <li style="background-color:#ffb752!important; border: 2px solid; border-color: #fff;">
                                <a style="color: #fff;" href="<?= BASE_URL ?>folio"><?= \Yii::t('invest_quick', 'Folio Details'); ?>
                                    <i class="ace-icon fa fa-bar-chart-o bigger-135"></i> 
                                </a>
                            </li>

                        <?php }
                        ?>



                    </ul>
                </div>
            </div>
        </div>



    <?php } else if ($action == 'sipplusauto') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport">SIP+ Regular Report</a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>sip-plusreport-auto">SIP+ Increment Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>execution-report">SIP+ Regular Execution</a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>execution-sip-auto">SIP+ Increment Execution</a>
                </li>
            </ul>
        </div>
    <?php } else if ($action == 'execution') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport">SIP+ Regular Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport-auto">SIP+ Increment Report</a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>execution-report">SIP+ Regular Execution</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>execution-sip-auto">SIP+ Increment Execution</a>
                </li>
            </ul>
        </div>
    <?php } else if ($action == 'executionautoinc') { ?>
        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport">SIP+ Regular Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-plusreport-auto">SIP+ Increment Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>execution-report">SIP+ Regular Execution</a>
                </li>

                <li class="active">
                    <a href="<?= BASE_URL ?>execution-sip-auto">SIP+ Increment Execution</a>
                </li>
            </ul>
        </div>

    <?php } else if ($action == 'siplumpsum') { ?>

        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li class="active">
                    <a href="<?= BASE_URL ?>sip-lumpsumreport">SIP++ LUMPSUM Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-systematicreport">SIP++ SYSTEMATIC Report</a>
                </li>

                <li >
                    <a href="<?= BASE_URL ?>syslumpsum-execution">SIP++ LUMPSUM Execution</a>
                </li>

                <li >
                    <a href="<?= BASE_URL ?>systematic-execution">SIP++ SYSTEMATIC Execution</a>
                </li>

            </ul>
        </div>


    <?php } else if ($action == 'sipsystematic') { ?>

        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-lumpsumreport">SIP++ LUMPSUM Report</a>
                </li>
                <li class="active">
                    <a href="<?= BASE_URL ?>sip-systematicreport">SIP++ SYSTEMATIC Report</a>
                </li>
                <li >
                    <a href="<?= BASE_URL ?>syslumpsum-execution">SIP++ LUMPSUM Execution</a>
                </li>

                <li >
                    <a href="<?= BASE_URL ?>systematic-execution">SIP++ SYSTEMATIC Execution</a>
                </li>
            </ul>
        </div> 
    <?php } else if ($action == 'lumpsumexecution') { ?>

        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-lumpsumreport">SIP++ LUMPSUM Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-systematicreport">SIP++ SYSTEMATIC Report</a>
                </li>

                <li class="active">
                    <a href="<?= BASE_URL ?>syslumpsum-execution">SIP++ LUMPSUM Execution</a>
                </li>

                <li >
                    <a href="<?= BASE_URL ?>systematic-execution">SIP++ SYSTEMATIC Execution</a>
                </li>

            </ul>
        </div>

    <?php } else if ($action == 'systematicexecution') { ?>

        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <div class="tabbable" style="padding-top: 20px;">
            <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                <li>
                    <a href="<?= BASE_URL ?>sip-lumpsumreport">SIP++ LUMPSUM Report</a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>sip-systematicreport">SIP++ SYSTEMATIC Report</a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>syslumpsum-execution">SIP++ LUMPSUM Execution</a>
                </li>

                <li class="active">
                    <a href="<?= BASE_URL ?>systematic-execution">SIP++ SYSTEMATIC Execution</a>
                </li>

            </ul>
        </div>

    <?php } else if ($action == 'timeline') {
        ?>
        <h1>
            <?php if ($disabled == 'disabled') { ?>
                <?= \Yii::t('invest_quick', 'profile viewer'); ?>
            <?php } else {
                ?>
                <?= \Yii::t('invest_quick', 'Profile Builder'); ?>
            <?php } ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?= \Yii::t('invest_quick', 'Timeline'); ?>

            </small>
        </h1>

    <?php } else if (!empty($this->params['page_header_info'])) {
        ?>

        <h1>
            <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['name']) ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo \Yii::t('invest_quick', $this->params['page_header_info']['sub_name']) ?>
            </small>
        </h1>
        <?php if ($action == 'Migration') { ?>
            <!--    <div class="col-lg-12" style="margin-top: -2%; margin-left: -5%;">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6">
                                       <a style="color: #fff;" href="<?= BASE_URL ?>quickstart"> <button class="btn btn-sm btn-success ">
                                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            Buy
                                             </button> </a>
                                         <a style="color: #fff;" href="<?= BASE_URL ?>redeem-transaction"> <button class="btn btn-lg btn-danger active">
                                          <i class="fa fa-money" aria-hidden="true"></i>
                                            Sell
                                             </button></a>
                                    </div>
                                </div>-->
            <div class="tabbable" style="padding-top: 20px;">
                <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">
                    <!--                    <li>
                                            <a href="<?= BASE_URL ?>redeem-transaction">Existing Funds</a>
                                        </li>-->

                    <?php /* <li>
                      <a href="<?= BASE_URL ?>swp">SWP</a>
                      </li> */ ?>
                    <!--                    <li>
                                            <a  href="<?= BASE_URL ?>switch-transation?id=sell">Switch</a>
                                        </li>-->
                    <?php /* <li >
                      <a  href="<?= BASE_URL ?>stp?id=sell">STP</a>
                      </li> */ ?>
                    <li class="active">
                        <a  href="<?= BASE_URL ?>migration-sell-switch">Migration Wizard</a>
                    </li>
                    <!--                    <li>
                                                      <a style="color: #fff;"href="<?= BASE_URL ?>systemetic-transaction">Systematic</a>
                                                </li>-->

                </ul>
            </div>

        <?php } ?>
        <?php if ($action == 'Systemetic') { ?>
            <div class="col-lg-12" style="margin-top: -2%; margin-left: -5%;">
                <div class="col-lg-6"></div>
                <!--                        <div class="col-lg-6">
                                           <a style="color: #fff;" href="<?= BASE_URL ?>quickstart"> <button class="btn btn-sm btn-success ">
                                               <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                Buy
                                                 </button> </a>
                                             <a style="color: #fff;" href="<?= BASE_URL ?>redeem-transaction"> <button class="btn btn-lg btn-danger active">
                                              <i class="fa fa-money" aria-hidden="true"></i>
                                                Sell
                                                 </button></a>
                                        </div>-->
            </div>
            <div class="tabbable" style="padding-top: 20px;">
                <ul class="nav nav-tabs padding-12 tab-color-blue" id="myTab4">

                    <li class="active">
                        <a href="<?= BASE_URL ?>systemetic-transaction">Systematic</a>
                    </li>

                </ul>
            </div>

        <?php } ?>


        <?php if ($this->params['page_header_info']['sub_name'] == 'Family Members and Friends') { ?>





            <?php
            $user = new User();
            $sid = \Yii::$app->user->identity->id;
            if ($sid == $id) {
                $data = $user->CheckAllUserFamily();
            } else {
                $data = $user->CheckAllUserFamily2($id);
            }
            $access = $user->CheckUserAccessDashboard($id);
            //if($sid==$id){
            if (count($data) > 0) {
                ?>
                <?php if ((in_array(Yii::$app->params['joint_account'], $access))) { ?>

                    <?php /* <div class="widget-toolbar no-border" style="margin-top: -36px;">
                      <ul class="nav nav-tabs" id="recent-tab">
                      <li style="background-color:#d54c7e!important; border: 2px solid; border-color: #fff;">
                      <a style="color: #fff;"  href="#"  data-toggle="modal" data-target="#joint-account"><?= \Yii::t('invest_quick', 'Open Joint Account'); ?>
                      <i class="ace-icon fa fa-plus-square-o bigger-140"></i>
                      </a>
                      </li>

                      </ul>
                      </div> */ ?>
                <?php
                }
            }
        }
        ?>

        <?php
    } else {
        ?>
        <h1> <?php if ($disabled == 'disabled') { ?> 

                <?= \Yii::t('invest_quick', 'Profile Viewer'); ?>
            <?php } else { ?> 
        <?= \Yii::t('invest_quick', 'Profile Builder'); ?>
                <?php } ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
    <?= \Yii::t('invest_quick', 'Build {perc} profile', ['perc' => $name . "'s"]); ?>

            </small>
        </h1>
<?php } ?>
</div>
<input type="hidden" name="userdetailname" id="userdetailname" value="<?php
if (!empty($name)) {
    echo $name;
}
?>"
       <!-- joint account Form -->

       <div class = "modal fade" id = "joint-account" tabindex = "-1" role = "dialog" aria-labelledby = "fbModalLebel">
    <div class = "modal-dialog " role = "document">
        <div class = "modal-content bradnd_detail_popup">

            <div class = "modal-header">

                <button class = "close close-custom" type = "button" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
                    </span></button>
                <h2 id = "headingmem" class = "modal-title-custom">Open Joint Account</h2>
                <div class="alert alert-block alert-danger errorformonsubmit2" id='form_errorformonsubmitjoint' style="display:none"></div>

            </div>
            <?php
            try {
                $getuserid = !empty($_COOKIE['uid']) ? $_COOKIE['uid'] : 0;
                $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
            } catch (ErrorException $e) {
                $utility = new Utility();
                $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
                $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
                if (!empty($getuserid) || empty($userAccess) || !empty($userAccess)) {
                    $utility->exceptionErrorCookiesBeforeAction($e);
                }
                //dashboarderrorlog
                // $this->redirect(BASE_URL . 'signin/loging');
                $utility = new Utility();
                $utility->Sessionexipary();
            }
            if (!empty($getuserid)) {
                $userid = $utility->descriptionFormatforcookie($getuserid);
            }
            /*             * ****Cookie********* */

            try {
                $myuser = new User();
                $list = $myuser->GetFamily($userid);
                $accounttypelist = $myuser->Accounttypelist();
                // echo '<pre>'; print_r($accounttypelist); 
            } catch (ErrorException $e) {
                $utility = new Utility();
                $getuserid = !empty($_COOKIE["uid"]) ? $_COOKIE["uid"] : 0;
                $userAccess = !empty($_COOKIE["user_access"]) ? $_COOKIE["user_access"] : '';
                if (!empty($getuserid) || empty($userAccess) || !empty($userAccess)) {
                    $utility->exceptionErrorCookiesBeforeAction($e);
                }
            }
            ?>
            <div class = "modal-body">

                <div id = "basic-details" class = "tab-pane fade in active">

                    <form class = "form-horizontal"  id = "sample-form-jointaccount" method = "post">

<!--     <input type="radio" name="account_type" id="account-type" value="joint-account" /> -->
                        <div class="clearfix"></div>
                        <div class="form-group  has-warning">
                            <!--  <label for="usergender" class="col-xs-12 col-sm-3 control-label no-padding-right">Gender</label> -->
                            <div class="col-sm-12">
                                <label for="proof_of_account" class="col-xs-12 col-sm-4 control-label no-padding-right">Account Type<span class="text-danger">*</span></label>


                                <div class="col-xs-12 col-sm-8">
                                    <span class="input-icon block input-icon-right">
                                        <?php
                                        $flag = False;
                                        for ($i = 0; $i < count($accounttypelist); $i++) {
                                            if ($accounttypelist[$i]['account_name'] == 'individual' || $accounttypelist[$i]['account_name'] == 'joint-account') {
                                                $flag = False;
                                            } else {
                                                $flag = True;
                                            }
                                            $checked = '';
                                            if ($accounttypelist[$i]['account_name'] == 'joint-account') {
                                                $checked = 'checked';
                                            }
                                            if ($flag == True) {
                                                ?>

                                                <input name="account-type" value="<?= $accounttypelist[$i]['account_name'] ?>" id="account_type" class="ace input-lg" checked type="radio">
                                                <span class="lbl"> &nbsp; <?php
                                                    $accountname = '';
                                                    if ($accounttypelist[$i]['account_name'] == 'joint-account') {
                                                        $accountname = 'Joint Account';
                                                    } else {
                                                        $EitherOrSurvivor = $GLOBALS['messages']['EitherOrSurvivor']['tooltipmessage'];

                                                        $accountname = 'Either or Survivor';
                                                    }
                                                    echo ucfirst($accountname)
                                                    ?> &nbsp;<i data-rel="popover" data-trigger="hover" data-placement="right" data-content="<?php echo $EitherOrSurvivor; ?>" class="ace-icon fa fa-info-circle" data-original-title="" title=""></i>
                                                </span>
    <?php }
}
?>
                                    </span>
                                </div></br></br>

                            </div>
                            <div class="col-sm-12">
                                <label for="proof_of_account" class="col-xs-12 col-sm-4 control-label no-padding-right">Primary Account<span class="text-danger">*</span></label>
                                <div class="col-xs-12 col-sm-8"> 
                                    <span>
                                        <select data-fv-field="primary_account" class="input-medium width-100" id="primary_account" 
                                                name="primary_account">
                                            <option value="">Select primary member</option>
<?php foreach ($list as $key => $value) { ?>

                                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
<?php } ?>

                                        </select>
                                    </span>
                                </div> </br></br>
                            </div>
                            <div class="col-sm-12">
                                <label for="secondary_account" class="col-xs-12 col-sm-4 control-label no-padding-right">Secondary Account<span class="text-danger">*</span></label>
                                <div class="col-xs-12 col-sm-8"> <span>
                                        <select data-fv-field="secondary_account" class="input-medium width-100" id="secondary_account" name="secondary_account">
                                            <option value="">Select secondary member</option>
<?php foreach ($list as $key => $value) { ?>

                                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
<?php } ?>
                                        </select>
                                    </span>
                                </div>
                            </div> 
                            <div class="col-md-offset-5 col-md-9"></br></br>
                                <button type="submit" name="submit" id="submit"  class="btn btn-primary" id="button" onclick="return join_account();">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<!-- End Form -->        
<style>
    /*    .buttonclass-btn{
        border-radius: 0!important;
        color: #7db4d8;
        margin-right: 0px;
        line-height: 16px;
        position: relative;
        padding: 6px 25px;
        text-align: center;
        border-color: #7db4d8;
        border-bottom-color: transparent;
        background-color: transparent;}*/

    .btn.active:after {
        display: inline-block;
        content: "";
        position: absolute;
        border-bottom: 0px solid #efe5b5;
        left: -4px;
        right: -4px;
        bottom: -4px;
    }
    h1 {
        font-size: 24px;
        font-weight: 400;
        font-family: "Helvetica","Helvetica Neue",Helvetica,Arial,sans-serif;
    }

</style>