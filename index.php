<?php
$is_mobile = preg_match('/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini|^$/i', $_SERVER['HTTP_USER_AGENT']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Vpon's task by Even Lo</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body class="container">
    <style type="text/css">
       html, body {
         margin: 0;
         padding: 0;
         width: 100%;
         height: 100%;
         display: table
     }
     .mobileTitle {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
    }
    #player2 {
        display: none;
    }
</style>
<?if(!$is_mobile) {?>
<h2>WebSocket Test</h2>
<div id="output"></div>
<p id="status"></p>
<iframe src="https://player.vimeo.com/video/83602545?autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="player1"></iframe>
<iframe src="https://player.vimeo.com/video/83602546" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen id="player2"></iframe>
<?} else {?>
<h3 class="mobileTitle">
   Rotate your mobile !!!
</h3>
<?}?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="assets/js/<?=$is_mobile?'mobile':'desktop'?>.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>