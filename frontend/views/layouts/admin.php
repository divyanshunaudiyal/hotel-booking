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
        <title>RSSB, DELHI</title>
        <?php $this->head() ?>
        <?php include(dirname(__FILE__) . "/../common/allcssjs.php"); ?>
    </head>

    <body class="no-skin">
        <?php include(dirname(__FILE__) . "/../common/navbar-admin.php"); ?>

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
                        <?php include(dirname(__FILE__) . "/../common/breadcrumb-admin.php"); ?>
                        <?php //echo $this->render('/common/breadcrumb.php', ['can' => !empty($can) ? $can : '']) ?>
                        <?php
                        $action = Yii::$app->controller->action->id;
                        $con = Yii::$app->controller->id;

                        if ($action == "index" && $con == "user") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">All User List</div>
                            </div>
                        <?php } ?>

                        <?php
                        if ($action == "csv" && $con == "user") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">Bluk Upload</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "create" && $con == "examboard") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">Add New Exam Board</div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($action == "update" && $con == "examboard") {
                            ?>
                            <div class="row ">

                                <div class="col-sm-4 ab" style="">Edit Exam Board</div>
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