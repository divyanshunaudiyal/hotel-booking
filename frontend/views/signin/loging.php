<?php include(dirname(__FILE__) . "/header.php"); ?>
<div class="loginColumns animated fadeInDown white-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="apic">
                    <div class="col-sm-12 " style="margin-top: 13%; margin-left: -5%;">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="ibox-content" >
                                <div class="col-xs-12 am-login-col" style="margin-top: 3%; margin-bottom: 10%;">
                                    <div class="row">
                                        <div class="col-sm-12 am-login-col">
                                            <a class="btn btn-primarynew btn-block" href="<?= BASE_URL ?>loging">LOGIN</a>
                                        </div>
                                    </div>
                                </div>
                                <form id="login_form" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="  form-group"> 
                                                <input type="text" autocomplete="off" class="input-group custominput form-control textboxZ" name="user_login_email" id="user_login_email"       value="" placeholder="EMAIL / MOBILE NO." required="required" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group"> 
                                                <input autofocus type="password" autocomplete="off" id="user_login_password" minlength="6" name="user_login_password" class="input-group custominput form-control textboxZ"  placeholder="PASSWORD"/>
                                            </div>
                                        </div>
                                        <p style="color:#fff;" id="errormsgId" style="display:none;"> </p>
                                    </div>
                                    <button type="submit" id="sign_in_button" class="btn btn-primarynew block full-width m-b buttonX">SUBMIT</button>
                                    <a href="<?= BASE_URL ?>forgotpassword" style="color:#fff" class="forgot-piss"> FORGOT PASSWORD</a>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 am-desktop-col-text">
                 
              
            </div>     
        </div>
    </div>
</div>

<style>
    .logo-name1 {
        color: #163850;
        font-size: 68px;
        font-weight: 800;
        letter-spacing: -5px;
        margin-bottom: 10%;
        margin-top: 35%;

    }
    .loginColumns {
        padding: 50px 20px 100px 20px;
    }
    .btn-primarynew {
        background-color: #8d3537;
        border-color: #de1225;
        color: #FFFFFF;
    }
    .btn-primarynew1 {
        background-color: #fff;
        border-color: #fff;
        color: #000;
    }
    .ibox-content {
        /*        background-color: #183f70;*/
        /*        color: inherit;*/
        padding: 15px 20px 20px 20px;
        /*        border-color: #183f70;*/
        border-image: none;
        /*        border-style: solid solid none;
                border-width: 1px 0;*/
    }
    .form-control, .single-line {
        background-color: #f5f6f7;
        background-image: none;
        border: 1px solid #fff;
        border-radius: 1px;
        color: black;
        display: block;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100%;
    }
    .fv-form-bootstrap .help-block {
        margin-bottom: 8px;
        color: red;
        font-size: 15px;
        margin-top: -3px;
        float: left;
        /* width: 100%; */
    }
    .fv-form-bootstrap .fv-icon-no-label {
        top: 0px;
        right: 9px;
        color: #916914;
    }
    .btn {
        border-radius: 0px;
    }
    .apic{
        border: 0px solid black;
        height: 386px;

        background:url(static/images/cloud.png);
        /*        background-repeat: no-repeat;*/
        background-size: contain;
        /*width: 460px;*/

    }
    .col-sm-10 {
        width: auto;
    }
    h2 {
        font-size: 28px;
    }

    .forgot-piss {margin-left: 45%;}
    .piss {width: 130% !important}
    .am-log-padding {padding-top: 20px;}

    @media only screen and (max-width: 768px) { .piss {width: 100% !important}
                                                .forgot-piss {margin-left: auto !important;}
                                                .piss-login-head {font-size: 19px !important}
                                                .am-login-col {padding-left: 0px; padding-right: 0px;}
                                                .am-desktop-login {display: none;}
                                                .am-mob-pad {margin-top: -25%;}
                                                .am-form-top-pad {padding-top: 0px; margin-top: -25%;}
                                                .am-log-padding {padding-top: 0px;}
                                                .btn-primarynew,
                                                .btn-primarynew1 {
                                                    width: 90%;
                                                    margin: 0 auto;
                                                }
                                                .loginColumns {
                                                    padding-bottom: 50px;
                                                }
    }
    @media only screen and (min-width: 769px) { 
        .am-mob-login {display: none;}

    }

</style>
