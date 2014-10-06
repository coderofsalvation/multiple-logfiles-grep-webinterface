<?
  function httpAuthenticate($user,$pass){
    $is_not_authenticated = (
      empty($_SERVER['PHP_AUTH_USER']) ||      
      empty($_SERVER['PHP_AUTH_PW']) ||
      $_SERVER['PHP_AUTH_USER'] != $user ||    
      $_SERVER['PHP_AUTH_PW']   != $pass
    );
    if( $is_not_authenticated ){
      header( 'HTTP/1.1 401 Authorization Required' ); 
      header( 'WWW-Authenticate: Basic realm="Example"' );
      print "You do not have permission..sorry";
      exit;
    }
  }
  httpAuthenticate("billy","worlddomination");
  date_default_timezone_set( "Europe/Amsterdam" );
?>


<?
   $today      = date("Y-m-d"); 
   $todaymonth = date("Y-m"); 
   $todayday   = date("d"); 
   $todaytime  = date("Y-m-d H:"); 
?>
<? if( !isset($_GET['raw']) ){ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your projectname</title>

    <style type="text/css">
      /* why is this css here and not in seperate file? because netcat cannot always handle simultanious browserrequests at the same time..so lets keep things lowprofile */

      /* toast.css */
      
      *{margin:0;padding:0;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}.container{max-width:960px;margin:0 auto;padding:0 30px;padding:0 1.5rem;}.grid{margin-left:-3%;max-width:105%;}.unit{display:inline-block;*display:inline;*zoom:1;vertical-align:top;margin-left:3%;margin-right:-.25em;overflow:hidden;*overflow:visible;}.unit.demo{background-color:#fff8eb;height:48px;height:3rem;margin-bottom:24px;margin-bottom:1.5rem;}.span-grid{width:97%;}.one-of-two{width:47%;}.one-of-three{width:30.36%;}.two-of-three{width:63.666666666%;}.one-of-four{width:22.05%;}.three-of-four{width:72%;}.one-of-five{width:17.07%;}.two-of-five{width:37%;}.three-of-five{width:57%;}.four-of-five{width:77%;}@media screen and (max-width: 650px) {.grid{margin-left:0;max-width:none;}.unit{width:auto;margin-left:0;display:block;}}p,.p,ul,ol,hr,table,form,pre,h1,.alpha,h2,.beta{margin-bottom:30px;margin-bottom:1.5rem;}h1,.alpha{font-size:60px;font-size:3rem;font-weight:700;line-height:1;}h2,.beta{font-size:30px;font-size:1.5rem;font-weight:400;line-height:2;}h3,.alpha{font-size:20px;font-size:1rem;font-weight:700;}hr{border:none;border-bottom:1px solid rgba(0,0,0,.1);margin-top:-1px;}html{font:125%/1.5 Helvetica Neue,Helvetica,Arial,sans-serif;}@media screen and (max-width: 650px) {html{font-size:100%;}}
      
      /* general style */
      
      html { padding:1.0em; font: 100%/1.5 Helvetica Neue,Helvetica,Arial,sans-serif;
        background: #f5f6f6; /* Old browsers */
        background: -moz-linear-gradient(top, #f5f6f6 0%, #dbdce2 21%, #b8bac6 49%, #dddfe3 80%, #f5f6f6 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f6f6), color-stop(21%,#dbdce2), color-stop(49%,#b8bac6), color-stop(80%,#dddfe3), color-stop(100%,#f5f6f6)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* IE10+ */
        background: linear-gradient(to bottom, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#f5f6f6',GradientType=0 ); /* IE6-9 */
      }
      h1 a{ color:#555}
      input,button,select { font-size: 16px; }
      label { width:38%; display:block; float:left }
      input { width:70%; margin-bottom: 0.8em; }
      input[type=number] { width:80px; }  
      input[type=checkbox] { width:20px }  
      div.console { border: 1px solid #888; overflow:scroll; margin-bottom:15px }
      div.console pre {
        font-size: 11px;
        color: #CCC;
      }
      input[type=submit], button { padding:1.0em }
      div.console pre, div.console{ background-color:#555; }
    </style>
  </head>
  <body>
    <style>
      .label{ float:left; }
      .clear { clear:both; }
      .select-editable { position:relative; background-color:white; border:solid grey 1px;  width:320px; height:18px; float:left; margin-right:20px }
      .select-editable select { position:absolute; top:0px; left:0px; font-size:18px; border:none; width:320px; margin:0; }
      .select-editable input { position:absolute; top:0px; left:0px; width:300px; padding:1px; font-size:18px; border:none; }
      .select-editable select:focus, .select-editable input:focus { outline:none; }
    </style>
    <div class='unit span-grid'>
      <h1>Your projectname</h1>
      <form method="post">
        <div class="select-editable" >
          <select onchange="this.nextElementSibling.value=this.value">
            <option value=""></option>
            <option value="<?=$todaytime?>"><?=$todaytime?></option>
            <option value="2023-10-06">2023-10-06</option>
            <option value="WARN">warnings</option>
            <option value="ERR">errors</option>
          </select>
          <? 
            $input = array_merge($_POST,$_GET);
            $placeholder = !isset($input['pattern']) ? "" : $input['pattern'];
          ?>
          <input type="text" name="pattern" value="<?=$placeholder?>"/>
        </div>
        <div class="label"><input type="submit" value="search" style="width:150px;"/></div>
      </form>
    </div>
    <br><br>
    <div class='unit span-grid console'><pre>
<? } ?><?
      $output;
      if( isset($_POST['pattern']) || isset($_GET['pattern']) ){
        $path    = dirname(__FILE__);
        $input   = array_merge($_POST,$_GET);
        $pattern = $input['pattern'];
        $cmd     = escapeshellcmd("timeout 4 {$path}/cli/greplogs '{$pattern}'");
        system($cmd);
        echo "\n\n(limiting output to 100 lines, search on specific date/time strings to see more)\n";
      }else echo "enter searchterm above, and press 'search' to start..";
    ?>
<? if( !isset($_GET['raw']) ){ ?>
    </pre>
    </div>
    <div class='unit span-grid'>
    <p>For full logs, see here:</p>
    <p style="padding-left:30px">
      <a target="_blank" href="/data/foo.log">foo.log</a><br>
      <br>
    </p>
    </div>

  </body>
</html>
<? } ?>
  
