<?php //

use common\models\Utility;

$utility = new Utility();
$con = Yii::$app->controller->id;
include "allbootstrapmessagejs.php";
$con = Yii::$app->controller->id;
?>
<link href="<?= STATIC_URL; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?= STATIC_URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="<?= STATIC_URL; ?>css/animate.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>" rel="stylesheet">


<link rel="stylesheet" media="all" type="text/css" href="<?= STATIC_URL; ?>css/validator.css?v=<?php echo STATIC_SITE_CONTENT_VERSION; ?>">

<link href="<?= STATIC_URL; ?>css/style.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,600italic,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?= STATIC_URL; ?>css/bootstrap-select.min.css?v=<?= STATIC_SITE_CONTENT_VERSION; ?>">
<script src="<?= STATIC_URL; ?>js/jQuery-1.11.2.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/bootstrap.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
    
    <?php // if($con != 'dashboard') { ?>


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="<?= STATIC_URL; ?>js/bootstrap-select.min.js"></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/combodate.js"></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/moment.js"></script>
<script   src='<?= STATIC_URL; ?>js/design.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>'></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/jquery-autocomplete-ui.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/validator.js?v=<?php echo STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/framework/bootstrap.min.js?v=<?php echo STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script  src="<?= STATIC_URL; ?>js/valdate-form.js?v=<?php echo STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script defer="defer" src="<?= STATIC_URL; ?>js/jquery.form.js?v=<?php echo STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/application.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/inspinia.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/plugins/pace/pace.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<?php //} ?>
<script src="<?= STATIC_URL; ?>js/plugins/metisMenu/jquery.metisMenu.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>
<script src="<?= STATIC_URL; ?>js/plugins/slimscroll/jquery.slimscroll.min.js?v=<?= STATIC_SITE_CONTENT_VERSION; ?>"></script>

<script>

//    var JS_USER_IP = userip;
    var JS_BASE_URL = '<?= BASE_URL; ?>';
    var JS_CDN_URL = '<?= CDN_URL; ?>';
    var JS_STATIC_URL = '<?= STATIC_URL; ?>';
    var JS_REFERRER_URL = '<?= Yii::$app->request->referrer ?>';
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-74657288-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134731485-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134731485-1');
</script>
<script>

  !function(f,b,e,v,n,t,s)

  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

  n.callMethod.apply(n,arguments):n.queue.push(arguments)};

  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

  n.queue=[];t=b.createElement(e);t.async=!0;

  t.src=v;s=b.getElementsByTagName(e)[0];

  s.parentNode.insertBefore(t,s)}(window, document,'script',

  'https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '1275764919228709');

  fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none"

  src="https://www.facebook.com/tr?id=1275764919228709&ev=PageView&noscript=1"

/></noscript>
<script>

  !function(f,b,e,v,n,t,s)

  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?

  n.callMethod.apply(n,arguments):n.queue.push(arguments)};

  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

  n.queue=[];t=b.createElement(e);t.async=!0;

  t.src=v;s=b.getElementsByTagName(e)[0];

  s.parentNode.insertBefore(t,s)}(window, document,'script',

  'https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '360699404660874');

  fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none"

  src="https://www.facebook.com/tr?id=360699404660874&ev=PageView&noscript=1"

/></noscript>

<script type='text/javascript'> if(typeof document.onselectstart!="undefined" )
{document.onselectstart=new Function ("return false" ); } else{document.onmousedown=new Function ("return false" );
document.onmouseup=new Function ("return false"); } </script>
 <script language=javascript>
var message="Function Disabled";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")

document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}



</script> 

