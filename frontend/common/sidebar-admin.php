<?php
$action = Yii::$app->controller->action->id;
$con = Yii::$app->controller->id;
?>
<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">

            <div class="dropdown profile-element"> 
                <a href="<?= BASE_URL ?>learn"><img alt="image" style="height: 62px;margin-top: -20%;margin-left: -15%;" src="<?= STATIC_URL ?>images/PMS AIF WORLD Logo-031.png" /></a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">


                    <li><a href="<?= BASE_URL ?>logout">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                PMS+
            </div>
        </li>
        <li <?php if ($action == 'index' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>users"><i class="fa fa-info-circle fa-6"></i> <span class="nav-label" style="font-size:14px;">User List</span></a></li>
        <li <?php if ($action == 'companydata' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>company-master"><i class="fa fa-users fa-6"></i> <span class="nav-label" style="font-size:14px;">Company Data</span></a></li>
        <li <?php if ($action == 'fundscheme' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>pms-fixed-data"><i class="fa fa-check-circle-o fa-6"></i> <span class="nav-label" style="font-size:14px;">PMS Fixed Data</span></a></li>
        <li <?php if ($action == 'csv' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>csv-upload"><i class="fa fa-upload fa-6"></i> <span class="nav-label" style="font-size:14px;">CSV Upload </span></a></li>
        <li <?php if ($action == 'pmsanalysismasterdata' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>pmsanalysismaster"><i class="fa fa-calendar fa-6"></i> <span class="nav-label" style="font-size:14px;">PMS Monthly Data</span></a></li>
        <li <?php if ($action == 'benchmarkdata' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>benchmark"><i class="fa fa-database fa-6"></i> <span class="nav-label" style="font-size:14px;">PMS Benchmark</span></a></li>
        <li <?php if ($action == 'portfolioholdings' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>portfolioholdings"><i class="fa fa-map-marker fa-6"></i> <span class="nav-label" style="font-size:14px;">Portfolio Holdings</span></a></li>
        <li <?php if ($action == 'sectorallocation' && $con == 'user') { ?>class="active" style=" background: #293846;" <?php } ?>><a href="<?= BASE_URL ?>sectorallocation"><i class="fa  fa-arrows-alt fa-6"></i> <span class="nav-label" style="font-size:14px;">Sector Allocation</span></a></li>

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