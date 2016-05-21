<!DOCTYPE html>
<html lang="zh_tw">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum - Mixerbox</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Latest compiled and minified CSS -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      <style type="text/css">
        body {
          margin-top: 20px;
        }
      </style>
    </head>
    <body>
     <div class="container">

      <div class="starter-template">
        <a href="/">Back List</a>
        <hr>
        <div class="well">
          <div class="row">
            <div class="col-xs-6">
             <h2><?=$article_detail->title?></h2>
           </div>
           <div class="col-xs-6">
             <h2 class="pull-right"><?=$article_detail->authorName?></h2>
           </div>
         </div>
         <br>
         <h5><?=$article_detail->text?></h5>
         <p class="pull-right"><?=date('Y-m-d H:i:s', $article_detail->created)?></p>
         <div class="clearfix"></div>
         <? foreach($article_detail->comments as $value) { ?>
         <div class="well">
          <p><?=$value->authorName?>:</p>
          <p><?=$value->comment?></p>
          <p class="pull-right"><?=date('Y-m-d H:i:s', $value->created)?></p>
        </div>
        <?}?>
      </div>


    </div>

  </div>



</body>
</html>