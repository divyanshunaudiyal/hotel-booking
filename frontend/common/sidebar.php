<?php
$action = Yii::$app->controller->action->id;
$con = Yii::$app->controller->id;
?>
<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">

            <div class="dropdown profile-element"> 
                <a href="<?= BASE_URL ?>learn"><img alt="image" style="height: 62px;margin-top: -15%;margin-left: -15%;" src="<?= HOME_URL ?>/wp-content/uploads/2016/10/PMS-AIF-WORLD-Logo-01-2-e1587985189762.png" /></a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">


                    <li><a href="<?= BASE_URL ?>logout">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                PMS+
            </div>
        </li>
         <li><a href="javascript:void(0);"> <span class="nav-label" style="font-size:18px;color: #cba240;">&nbsp;&nbsp;&nbsp;PMS</span></a></li>
        <li <?php if ($action == 'whypms' && $con == 'dashboard') { ?>class="active" style=" background: #916914;" <?php } ?>><a href="<?= BASE_URL ?>about-pms"><i class="fa fa-info-circle fa-6"></i> <span class="nav-label" style="font-size:14px;">About PMS</span></a></li>
                <li <?php if ($action == 'index' && $con == 'dashboard') { ?>class="active" style=" background: #916914;" <?php } ?>><a href="<?= BASE_URL ?>learn"><i class="fa fa-dashboard fa-6"></i> <span class="nav-label" style="font-size:14px;">PMS Dashboard</span></a></li>
                <li  <?php if ($action == 'compare' && $con == 'dashboard') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>compare?r="><i class="fa fa-laptop"></i> <span class="nav-label" style="font-size: 14px;">PMS Comparison</span></a>
                </li>
                <li  <?php if ($action == 'performancecomparison' && $con == 'dashboard') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>performance-comparison"><i class="fa fa-th-large"></i> <span class="nav-label" style="font-size: 14px;">Top PMS</span></a>
                </li>
                <li class="<?php if ($action == 'returncomparisonall' && $con == 'dashboard') { ?>active" style=" background: #916914;" <?php } ?>">
                    <a href="<?= BASE_URL ?>return-comparison-all"><i class="fa fa-globe fa-6"></i> <span class="nav-label">PMS Returns</span></a>
                </li>
                <li><a href="javascript:void(0);"> <span class="nav-label" style="font-size:18px;color: #cba240;">&nbsp;&nbsp;&nbsp;AIF</span></a></li>
         <li <?php if ($action == 'whyaif' && $con == 'aif') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>about-aif"><i class="fa fa-info-circle fa-6"></i> <span class="nav-label" style="font-size: 14px;">About AIF</span></a>
                </li>
                <li <?php if ($action == 'index' && $con == 'aif') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>aif-dashboard"><i class="fa fa-diamond fa-6"></i> <span class="nav-label" style="font-size: 14px;">AIF Dashboard</span></a>
                </li>
                <li <?php if ($action == 'allaifdata' && $con == 'aif') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>all-aif"><i class="fa fa-globe fa-6"></i> <span class="nav-label" style="font-size: 14px;">All AIF</span></a>
                </li>
               <li <?php if ($action == 'aifcomparison' && $con == 'aif') { ?>class="active" style=" background: #916914;" <?php } ?>>
                    <a href="<?= BASE_URL ?>return-comparison-aif"><i class="fa fa-globe fa-6"></i> <span class="nav-label" style="font-size: 14px;">AIF Returns</span></a>
                </li>

    </ul>
</div>
<script id="setmore_script" type="text/javascript" src="https://my.setmore.com/webapp/js/src/others/setmore_iframe.js"></script>
<style>
    .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
    }
</style>