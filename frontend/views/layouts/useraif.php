<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en-US" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="keywords" content="PMS, AIF" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="<?= BASE_URL; ?>static/images/favicon.ico"/>
        <title>Welcome To PMS AIF World</title>
        <?php $this->head() ?>
        <?php include(dirname(__FILE__) . "/../common/allcssjs.php"); ?>
    </head>

    <body class="no-skin">
        <?php include(dirname(__FILE__) . "/../common/navbaraif.php"); ?>

        <div id="wrapper">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-content">
                <div class="main-content-inner">
                    <div id="page-wrapper" class="gray-bg dashbard-1">
                        <?php include(dirname(__FILE__) . "/../common/breadcrumb.php"); ?>
                        <?php //echo $this->render('/common/breadcrumb.php', ['can' => !empty($can) ? $can : '']) ?>
                        <?php
                        $action = Yii::$app->controller->action->id;
                        $con = Yii::$app->controller->id;

                        if ($action == "performancecomparison" && $con == "dashboard") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">Top PMS</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "compare" && $con == "dashboard") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">PMS Comparison</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "whypms" && $con == "dashboard") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-3 ab" style="">About PMS</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "whyaif" && $con == "aif") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-3 ab" style="">About AIF</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "changepassword" && $con == "dashboard") {
                            ?>
                            <div class="row ">
                                <div class="col-sm-3 ab" style="">Change Password</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "thankupage" && $con == "dashboard") {
                            ?>
                            <div class="row ">
                                <div class="col-sm-3 ab" style="">Welcome</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "aifpatners" && $con == "aif") {
                            ?>
                            <div class="row ">
                                <div class="col-sm-3 ab" style="">AIF Partners</div>
                            </div>
                        <?php } ?>

                        <?= $content; ?>
                    </div>
                </div>
            </div>
            <?php //include(dirname(__FILE__) . "/../common/inner_footer.php");  ?>
        </div>
    </body>				
</html>
<?php $this->endPage() ?>
<style>.ab{
        margin-top: 2.5%;
        font-size: 20px;
        text-align: center;
        padding-top: 17px;
        background-color: #163850;
        height: 60px;
        border-radius: -83px;
        border-bottom-right-radius: 16px;
        color: #fff;
        font-weight: 332px;
    }
</style>