<header>
    <nav class="navbar navbar-default customNav">
       
        <div class="myNav">
            <div class="container" style="width: 95%;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="navbar-header" style="margin: 0px">
                            <a class="navbar-brand" style="height: 80px;padding: 14px;" href="javascript:void(0)">
                                  <!--<img src="<?= STATIC_URL ?>images/logo.jpg"  />-->
                            </a>
                            <button type="button" class="navbar-toggle collapsed togglebutton" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
                                <span class="sr-only">Toggle navigation</span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                                <span class="icon-bar"></span> 
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="header-right">
                            <ul style="margin: 28px 0;">
                              <li class="h_wealth" style="padding-left: 15px;">
                                  <!--<a href="javascript:void(0)" style="margin-right: 15px;"> Radha Swami Satsang</a>-->
                                </li>
<!--                                <li class="h_call" style="padding-left: 15px;">
                                    <a href="tel:9810130417" style="margin-right: 15px;"><img src="<?= STATIC_URL ?>img/book-call.png">Call Now</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </nav>
</header>
<style type="text/css">
.apic .ibox-content {
    width: 275px;
    margin: 0 auto;
}
.customNav .navbar-brand {
    padding: 0;
    height: 40px;
}
.customNav .navbar-brand>img {
    height: 56px;
}
.m-view {
    display: none !important;
}
.clear {
    display: block;
    width: 100%;
    height: 0px;
    line-height: 0px;
    height: 0px;
    font-size: 0px;
}
.customNav .navbar-header {
    margin: 10px 0;
}
.header-right {
    float: right;
}
.header-right ul {
    display: block;
    list-style-type: none;
    padding: 0;
    font-size: 0px;
    margin: 15px 0;
}
.header-right ul li {
    display: inline-block;
    border-right: 1px solid #fff;
    padding-left: 30px;
}
.header-right ul li:last-child {
    border-right: 0px;
}
.header-right ul li:last-child a {
    margin-right: 0;
}
.header-right ul li a {
    font-size: 18px;
    color: #fff;
    display: block;
    font-weight: 400;
    margin-right: 30px;
}
.header-right ul li a img {
    width: 30px;
    margin-right: 15px;
}
.customNav.navbar-default {
    margin-bottom: 0 !important;
}
.navbar-2 {
    text-align: center;
    background-color: #fff;
}
.navbar-2 ul {
    display: inline-block;
    font-size: 0px;
    padding: 0;
    width: 100%;
}
.myNav {
    border-bottom: 1px solid #000;
}
.navbar-2 ul li {
    display: inline-block;
    float: none;
}
.customNav .navbar-2 ul li a {
    padding-left: 20px;
    padding-right: 20px;
    font-weight: 400;
    color: #242a2d;
    font-size: 16px;
    font-family: montserrat,sans-serif; 
}
.customNav .navbar-2 ul li a:hover,
.customNav .navbar-2 ul li a:focus,
.customNav .navbar-2 ul li a:active,
.customNav .navbar-2 ul li a:visited {
    background-color: transparent;
    color: #242a2d;
}
button.navbar-toggle {
    background: transparent;
    padding: 12px;
    margin-right: 0;
}
.loginColumns {
    max-width: initial;
    width: 100%;
    margin: 0 auto;
    padding: 100px 20px 20px 20px;
}

@media (max-width: 768px) {
    .customNav .navbar-header {
        display: block;
        float: none;
    }
    .customNav.navbar-default {
        background-color: #222a2d;
    }
    .customNav .navbar-brand {
        margin-top: 7px;
    }
    .m-view {
        display: block !important;
    }
    .header-right {
        display: none;
    }
    .navbar-collapse {
        background-color: #222a2d;
        border: 0;
    }
    .customNav .navbar-2 ul li {
        display: block;
        text-align: left;
    }
    .customNav .navbar-2 ul li a {
        font-size: 16px;
        color: #fff;
        padding: 0;
        line-height: 40px;
    }
    .customNav .navbar-2 ul li a:hover,
    .customNav .navbar-2 ul li a:focus,
    .customNav .navbar-2 ul li a:active,
    .customNav .navbar-2 ul li a:visited {
        color: #fff;
        outline: none;
        border: 0;
        background-color: transparent;
    }
    .loginColumns {
        padding-top: 0px !important;
    }
    .apic {
        height: auto !important;
    }
    .apic .ibox-content {
        width: 100%;
    }
}

.top-head {
    padding: 8px 0;
    position: relative;
    z-index: 0;
    overflow: hidden;
}
</style>
