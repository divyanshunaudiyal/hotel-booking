<?php

use common\models\Students;

$user_id = 0;
$student_details = '';
if (isset($_COOKIE['s_id'])) {
    $user_id = !empty($_COOKIE['s_id']) ? $_COOKIE['s_id'] : 0;
}
if (!empty($user_id)) {
    $studentmodel = new Students();
    $student_details = $studentmodel->studentdetails($user_id);
}
?>

<!-- navbar start -->
<div class="navbar-area">
    <!-- navbar top start -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-md-left text-center">
                    <ul>
                        <li><p><i class="fa fa-map-marker"></i> 2072 Pinnickinick Street, WA 98370</p></li>
                        <li><p><i class="fa fa-envelope-o"></i>  info@website.com</p></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="topbar-right text-md-right text-center">
                        <li class="social-area">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area-1 navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#edumint_main_menu" 
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a href="<?= BASE_URL ?>home"><img src="<?= STATIC_URL ?>img/logo/logo.png" alt="img" style="height:100px;"></a>
            </div>
            <?php
            if (!empty($student_details)) {
                ?>
                <div class="nav-right-part nav-right-part-mobile">
                    <a ><i class="fa fa-user"></i><?= $student_details['name'] ?></a>
                    <a class="btn btn-base" href="<?= BASE_URL ?>logout">Logout</a>
                </div>
                <?php
            } else {
                ?>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="signin-btn" href="<?= BASE_URL ?>signin">Sign In</a>
                    <a class="btn btn-base" href="<?= BASE_URL ?>signup">Sign Up</a>
                </div>
            <?php } ?>
            <div class="collapse navbar-collapse" id="edumint_main_menu">
                <ul class="navbar-nav menu-open">
                    <li class="">
                        <a href="<?= BASE_URL ?>home">Home</a>
                    </li>
                    <li class="">
                        <a href="<?= BASE_URL ?>about-us">About Us</a>
                    </li>
                    <li class="">
                        <a href="<?= BASE_URL ?>plan-details">Pricing list</a>
                    </li>
                    <li class="">
                        <a href="<?= BASE_URL ?>content-details">Content</a>
                    </li>
                    <li><a href="<?= BASE_URL ?>contact">Contact Us</a></li>
                </ul>
            </div>
            <?php
            if (!empty($student_details)) {
                ?>
                <div class="nav-right-part nav-right-part-desktop">
                    <a><i class="fa fa-user"></i><?= $student_details['name'] ?></a>
                    <a class="btn btn-base" href="<?= BASE_URL ?>sign-in">Logout</a>
                </div>
                <?php
            } else {
                ?>
                <div class="nav-right-part nav-right-part-desktop">
                    <a class="btn-warning btn" href="<?= BASE_URL ?>sign-in">Sign In</a>
                    <a class="btn btn-base" href="<?= BASE_URL ?>signup">Sign Up</a>
                </div>
            <?php } ?>
        </div>
    </nav>
</div>
<!-- navbar end -->

<style>
    .navbar{
        background: #fff;
    }

</style>

<script>
    function class_subject() {
//        $('#navsubmenu').show();
    }

</script>