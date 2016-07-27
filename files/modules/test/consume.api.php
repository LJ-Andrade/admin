<?php
  function getAPI($uri) {

    $CURL_OPTS = array(
        CURLOPT_USERAGENT => "INNOVA-SDK-1.0.0",
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 60
    );

    $ch = curl_init($uri);
    curl_setopt_array($ch, $CURL_OPTS);

    $return["body"] = json_decode(curl_exec($ch), false);
    $return["httpCode"] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $return;
  }
  if($_GET["id"])
    $Data = getAPI("http://www.escuelaamha.com.ar/files/modules/information/api.php?access_token=pepe&id=".$_GET["id"]);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input type="text" id="userid" value="">
    <br>
    <button type="button" name="btn" id="btn">Ver Mi Usuario</button>
    <br>
    <br>
    <br>
    <pre>
      <?php print_r($Data); ?>
    </pre>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script type="text/javascript">
      $(function(){
        $("#btn").click(function(){
          location.href = 'consume.api.php?id='+$("#userid").val();
        });
      });
    </script>
  </body>
</html>
