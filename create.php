<!--

This code was created by Jonathan2018.
Copyright (c), All Right Reserved. 2020.\

You may not redistribute this code without the following conditions.

1. Include this copyright note. 
2. Include everything within this comment including the name and these conditions!

-->


<?php
$url1 = $_POST['urlin'];
$file = rand(100,1000000);
$htmlcode = "<!DOCTYPE html>
<html>
  <head>
    <title>Redirect</title>
    <script src='resources/script.js'></script>
    <link href='resources/style.css' rel='stylesheet' type='text/css' />
    <link href='resources/redirect.css' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap' rel='stylesheet'>
  </head>
  <body onload=window.location.href='$url1'>
  
  <h1 id='statuscode'>301/302</h1>
  <h2>You are being redirected. See you soon.</h2>
  <p>This redirect is created by <a href='index.php'>URL Hider/Shortener</a></p>
  <a href='$url1'>If you're stuck on this page click here to manually redirect.</a>

  <pre>Redirect Version: 2.0.7</pre>
  </body>
  </html>";

/*while(file_exists("sites/$file.html")){
  $file++;
}*/

while(file_exists("s/$file.html")){
  $file = rand(100,1000000);
}



  $urlfile = fopen("s/$file.html", "w") or die("Unable to open file!");
  
  $txt = $htmlcode.PHP_EOL;
  fwrite($urlfile, $txt);


  fclose($urlfile);
  
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <title>URL Changer/Shortener | Copy Your Link</title>
    <script src="script.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
  </head>
  <body onload="setTimeout(function () {document.getElementById('load').style.display='none'; document.getElementById('info').style.display='block'}, 3000); return false">

<div id="load"></div>

<div id="info" style="display: none">
<h3 class="dark">Here is your link!</h3>
<a id="link" target="_blank" href="/s/<?=$file?>.html">https://$_SERVER['HTTP_HOST']/s/<?=$file?>.html</a>

<img class="copy" id="lightcopy" src="images/copylight.png" onclick="Copy('#link');" alt="Copy" title="Copy Link">
<!--<img class="copy" id="dark" style="display:none" src="images/copylight.png" onclick="Copy('#link')" alt="Copy" title="Copy Link">-->

<p id="copytext" class="dark">Copy Link</p>


<a id="again" href="index.php">Hide/Shorten another link here</a>

</div>

</body>
</html>
