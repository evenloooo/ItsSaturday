<?php
/* USER-AGENTS
================================================== */
function check_user_agent ( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
        if ( $type == 'bot' ) {
                // matches popular bots
                if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
        } else if ( $type == 'browser' ) {
                // matches core browser types
                if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                        return true;
                }
        } else if ( $type == 'mobile' ) {
                // matches popular mobile devices that have small screens and/or touch inputs
                // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
                // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
                if ( preg_match ( "/phone|iphone|itouch|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                        // these are the most common
                        return true;
                } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                        // these are less common, and might not be worth checking
                        return true;
                }
        }
        return false;
}

$is_mobile = check_user_agent('mobile');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <meta name="description" content="用手機來控制電腦上的影片吧！" />
  <meta name="author" content="EvenLo" />
  <meta property="og:image" content="assets/img/tour.png" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:url" content="http://creative.even.pw/"/>
  <meta property="og:title" content="向左轉，向右轉。"/>
  <title>Vpon's task</title>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55909698-3', 'auto');
    ga('send', 'pageview');

  </script>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body class="container">
  <style type="text/css">
   html, body {
     margin: 0;
     padding: 0;
     width: 100%;
     height: 100%;
     display: table;
     text-align: center;
   }
   .mobileTitle {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
  }
  #player2 {
    display: none;
  }
  h2,h4 {

    text-align: center;
  }
  iframe, div {
    display: table;
    margin: 0 auto;
  }
  img {
    border: 1px solid;
    width:100%;
  }
</style>
<?if(!$is_mobile) {?>
<h2>Vpon's task</h2>
<h4>Author: <a href="http://even.pw">Even Lo</a></h4>
<hr>
<iframe src="https://player.vimeo.com/video/83602545?autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="player1"></iframe>
<iframe src="https://player.vimeo.com/video/83602546" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="player2"></iframe>
<div style="margin-top: 30px;">
  <h3>用你的手機來控制影片吧！</h3>
  <h5>用手機打開網址 <a href="http://creative.even.pw/">http://creative.even.pw/</a>，透過螢幕轉向來控制影片</h5>
  <div class="row well">
    <div class="col-xs-5">
      <img src="assets/img/tour.png">
    </div>
    <div class="col-xs-1" style="font-size: 50px; font-weight: bold; margin-top: 7%;"> <=>
    </div>
    <div class="col-xs-5">
      <img src="assets/img/tour2.png">
    </div>
  </div>
</div>
<?} else {?>
<h3 class="mobileTitle">
 向左轉，向右轉。<br><span style="font-size: 16px">你的動作將會影響在電腦上正播放的影片。</span>
</h3>
<?}?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="assets/js/<?=$is_mobile?'mobile':'desktop'?>.js?v=4"></script>
<script src="assets/js/main.js"></script>
</body>
</html>