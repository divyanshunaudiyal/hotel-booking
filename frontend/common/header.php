<header class=" sticky-nav sticky-rev noprint">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header"> <a href="<?= BASE_URL; ?>" rel="home" class="default navbar-logo retina-logo"> <img src="<?= STATIC_URL; ?>images/logo-2x-white.png" alt="PMS- AIF logo" /> </a> <a href="<?= BASE_URL; ?>" rel="home" class="default navbar-logo default-logo"> <img src="<?= STATIC_URL; ?>images/logo.png" alt="PMS-AIF logo" /> </a> </div>
        <div id="main-nav" class="collapse navbar-collapse menu-main-menu-container">
            <ul id="menu-create-menu" class="nav navbar-nav navbar-right jt-main-nav " style="float: right;">
                <li><a title="" href="<?= BASE_URL; ?>">Home</a></li>
                <li class="dropdown"><a title="" href="<?= BASE_URL; ?>individuals" data-toggle="dropdown" class="dropdown-toggle sub-collapser disabled">For Individuals <b class="caret"></b></a>
                    <ul role="menu" class=" dropdown-menu pageScorllMenu">
                        <li><a title=" " href="individuals#funds">Mutual Funds</a></li>
                        <li><a title=" " href="individuals#insurance">Insurance</a></li>
                        <li><a title=" " href="individuals#advisory">Advisory Services</a></li>
                        <li><a title=" " href="individuals#loans">Loans</a></li>
                        <li><a title=" " href="individuals#deals">Member only Deals</a></li>
                    </ul>
                </li>
                <li><a title="" href="<?= BASE_URL; ?>businesses">For Businesses</a></li>
                <li ><a title="" href="<?= BASE_URL; ?>associates">For Associates</a></li>
                <li class="dropdown"><a title="" href="<?= BASE_URL; ?>about" data-toggle="dropdown" class="dropdown-toggle sub-collapser disabled">About <b class="caret"></b></a>
                    <ul role="menu" class=" dropdown-menu">
                        <li><a title=" " href="about#mission">Our Mission</a></li>
                        <li><a title=" " href="about#constitution">Our Constitution</a></li>
                        <li><a title=" " href="about#team">Our Team</a></li>
                        <li><a title=" " href="about#contact">Contact Us</a></li>
                    </ul>
                </li>
                <li>
                    <a class="GetStarted cursor-pointer" href="<?= BASE_URL ?>signin/index" >
                        Get Started
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Slim Menu -->
    <div class="hidden-big-screen ">
        <div class=" sticky-nav sticky-rev jt-slim-top"> <a href="<?= BASE_URL; ?>" rel="home" class="default navbar-logo retina-logo"> <img src="<?= STATIC_URL; ?>images/logo-2x-white.png" alt="PMS-AIF logo" /> </a>
            <a href="<?= BASE_URL; ?>" rel="home" class="default navbar-logo default-logo"> <img src="<?= STATIC_URL; ?>images/logo.png" alt="logo" /> </a>
            <div class="menu-main-menu-container">
                <ul id="menu-main-menu" class="nav navbar-nav navbar-right jt-agency-menu-list slimmenu jt-slimmenu jt-top-slimmenu" style="float: right !important;">

                    <li class="dropdown"><a title="Pages" href="<?= BASE_URL; ?>individuals" data-toggle="dropdown" class="dropdown-toggle sub-collapser">For Individuals <b class="caret"></b></a>
                        <ul role="menu" class=" dropdown-menu pageScorllMenu">
                            <li><a title=" " href="individuals">Individuals</a></li>
                            <li><a title=" " href="individuals#funds">Mutual Funds</a></li>
                            <li><a title=" " href="individuals#insurance">Insurance</a></li>
                            <li><a title=" " href="individuals#advisory">Advisory Services</a></li>
                            <li><a title=" " href="individuals#loans">Loans</a></li>
                            <li><a title=" " href="individuals#deals">Member only Deals</a></li>
                        </ul>
                    </li>
                    <li><a title="" href="<?= BASE_URL; ?>businesses">For Businesses</a></li>
                    <li ><a title="" href="<?= BASE_URL; ?>associates">For Associates</a></li>
                    <li class="dropdown"><a title="" href="<?= BASE_URL; ?>about" data-toggle="dropdown" class="dropdown-toggle sub-collapser">About <b class="caret"></b></a>
                        <ul role="menu" class=" dropdown-menu">
                            <li><a title=" " href="<?= BASE_URL; ?>about">About Us</a></li>
                            <li><a title=" " href="about#mission">Our Mission</a></li>
                            <li><a title=" " href="about#contitution">Our Constitution</a></li>
                            <li><a title=" " href="about#team">Our Team</a></li>
                            <li><a title=" " href="about#contact">Contact Us</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="GetStarted cursor-pointer" href="<?= BASE_URL; ?>signin/index">
                            Get Started
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Slim Menu -->
</header>

