<?php

    use yii\helpers\Html;

/* @var $this yii\web\View */
    /* @var $name string */
    /* @var $message string */
    /* @var $exception Exception */

    $common = new frontend\models\Common();
    if (!empty($_GET['url'])) {
        $this->title = $common->removeSpecialCharsWithHyphen($_GET['url']);
    } else {
        $this->title = 'PMS-AIF | 404';
    }
?>

<div class="page-wrap login">

    <?php include(dirname(__FILE__) . "/header.php"); ?>
    <div class="mainwrapper">
        <div class="jt-wwd-tab-links" align="center">
            <div class="jt-wwd-headings"></br></br>
                <i class="fa fa-exclamation-triangle errorico"></i>
                <h1>404 Error</h1>
                <h2 class="jt-large-heading" style="">It seems something has gone wrong, let's try this again in some time.</h2></br></br>
            </div>
            <h2><a href="javascript:history.back()" class="buttonB">GO BACK</a></h2>


        </div>
    </div>

</div>


<?php include(dirname(__FILE__) . "/footer.php"); ?>