<?php include(dirname(__FILE__) . "/../common/allcssjs.php"); ?>
<?php include(dirname(__FILE__) . "/../common/navbar.php"); ?>
<?php

    use common\models\Utility;

$utility = new Utility();
    ?>
    <body class="no-skin">
        <?php include(dirname(__FILE__) . "/../common/navbar.php"); ?>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>
            <?php include(dirname(__FILE__) . "/../common/sidebar.php"); ?>
            <div class="main-content">
                <div class="main-content-inner">
                    <?php //include(dirname(__FILE__) . "/../common/breadcrumb.php"); ?>
                    <?php echo $this->render('/common/breadcrumb.php', ['can' => !empty($can) ? $can : '']) ?>