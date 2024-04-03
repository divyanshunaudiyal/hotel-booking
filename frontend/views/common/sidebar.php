<?php
$action = Yii::$app->controller->action->id;
$con = Yii::$app->controller->id;

use common\models\User;
use common\models\Utility;
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
}
$modeldata = new User();
$userdata = $modeldata->Useradmin($getuserid);
?>

<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> 
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="<?= BASE_URL ?>logout">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                A.K.
            </div>
        </li>
        <li style="display:flex;">
            <img src="<?= STATIC_URL ?>images/user_image/<?= $userdata['user_image'] ?>" alt="no image" class="user-image">
        </li>
                <li <?php if (($action == 'dashboard' || $action == 'create' || $action == 'update') && $con == 'user') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>dashboard"><i class="fa fa-home fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Dashboard</span></a></li>

        <?php if ($userdata['user_type'] == 'superadmin') { ?>
            <li <?php if (($action == 'userlist' || $action == 'create' || $action == 'update') && $con == 'user') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>user-list"><i class="fa fa-user fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Users</span></a></li>
        <?php } ?>
        <?php if ($userdata['user_type'] == 'superadmin') { ?>
            <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'destination') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>destination-list"><i class="fa fa-map-marker
 fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Destination</span></a></li>
        <?php } ?>
 
 <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'hotels') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>hotels-list"><i class="fa fa-hotel fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Hotels</span></a></li>
 
        <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'hotel-name') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>hotelname-list"><i class="fa fa-user fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Branch</span></a></li>
        <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'rooms') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>rooms-list"><i class="fa fa-hotel fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Rooms</span></a></li>
<?php if ($userdata['user_type'] == 'superadmin') { ?>
        <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'roomtype') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>roomtype-list"><i class="fa fa-bed fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Room Type</span></a></li>
<?php } ?>
        
        <li <?php if (($action == 'index' || $action == 'create' || $action == 'update') && $con == 'booking') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>booking-list"><i class="fa fa-book fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Booking</span></a></li>
        <li <?php if (($action == 'enquireindex' || $action == 'create' || $action == 'update') && $con == 'booking') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>enquire-list"><i class="fa fa-question fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Enquire</span></a></li>

<?php if ($userdata['user_type'] == 'superadmin') { ?>
        <li <?php if (($action == 'setting' || $action == 'create' || $action == 'update') && $con == 'user') { ?>class="active" style=" background: #163850;" <?php } ?>><a href="<?= BASE_URL ?>passwordchange"><i class="fa fa-lock fa-6"></i> <span class="nav-label" style="font-size:16px;color: #cba240;">Password Change</span></a></li>
<?php } ?>



    </ul>
</div>
<style>
    .user-image {
    width: 100px; /* Adjust the size as needed */
    height: 100px; /* Same as width to make it perfectly round */
    border-radius: 50%; /* Makes the element perfectly round */
    margin: 10px auto; /* Centers the element horizontally with some margin */
}

    .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
    }
</style>
