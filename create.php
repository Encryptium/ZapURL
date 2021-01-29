<!--

Copyright 2021 Jonathan Wang

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

-->


<?php
$ua = $_SERVER['HTTP_USER_AGENT'];
$ra = $_SERVER['REMOTE_ADDR'];
$cliproxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
$domain = $_SERVER['HTTP_HOST'];
$url1 = $_POST['urlin'];
$sel = $_POST['custom'];
/* if (!empty($_POST['cusurl'])) {
  $custom = $_POST['cusurl'];
} */
// This will generate a random ID for the link.
$linkID = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$file = substr(str_shuffle($linkID), 0, 6);
$htmlcode = "<!DOCTYPE html>
<html>
  <head>
    <title>Redirect</title>
    <script src='//$domain/script.js'></script>
    <link href='//$domain/style.css' rel='stylesheet' type='text/css' />
    <link href='//$domain/sys/assets/redirect.css' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap' rel='stylesheet'>
  </head>
  <body onload=window.location.href='$url1'>
  
  <h1 id='statuscode'>301/302</h1>
  <h2>You are being redirected. See you soon.</h2>
  <p>This redirect is created by <a href='//$domain/index.php'>URL Hider/Shortener</a></p>
  <a href='$url1'>If you're stuck on this page click here to manually redirect.</a>

  <pre>Redirect Version: 2.0.7</pre>
  </body>
  </html>";

if (strlen($url1) == 0) {
  header("Location: index.php?error=emptyrequest");
  return "Error Information Package could not be sent as request. <a href='index.php'><b>Go Home</b></a>";
}
else if (strpos($url1, $domain) > 0) {
  header("Location: index.php?error=host");
  return "Error Information Package could not be sent as request. <a href='index.php'><b>Go Home</b></a>";
}
else if (strpos($url1, "//") == NULL || strpos($url1, ".") == NULL) {
  header("Location: index.php?error=invalidprotocol&url={$url1}");
  return "Error Information Package could not be sent as request. <a href='index.php'><b>Go Home</b></a>";
}


/*while(file_exists("sites/$file.html")){
  $file++;
}*/

//Check if file already exists 
//Keep generating a new ID until it is unique

if ($sel) {

    if (empty($_POST['cusurl'])) {
      header("Location: index.php?error=emptycustom");
      return "Error Information Package could not be sent as request. <a href='index.php'><b>Go Home</b></a>";
    } else {
      $custom = $_POST['cusurl'];
    }
    if (file_exists("c/{$custom}")) {
      header("Location: index.php?error=at");
      return "Error Information Package could not be sent as request. <a href='index.php'><b>Go Home</b></a>";
    }

    $type = "c";
  
    mkdir("c/{$custom}");

    $urlfile = fopen("c/{$custom}/index.html", "w") or die("Unable to open file!");
    
    $txt = $htmlcode.PHP_EOL;
    fwrite($urlfile, $txt);


    fclose($urlfile);

    $dir = $custom;
    session_start();
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $email = " | Email: {$email}";
    $name = " | Name: {$name}";
    
} else {
  while(file_exists("s/{$file}")){
    $file = substr(str_shuffle($linkID), 0, 6);
  }

    $type = "s";
    mkdir("s/{$file}");

    $urlfile = fopen("s/{$file}/index.html", "w") or die("Unable to open file!");
    
    $txt = $htmlcode.PHP_EOL;
    fwrite($urlfile, $txt);


    fclose($urlfile);
    $dir = $file;
    
}

$date = date("Ymd");

$sites = fopen("sys/Frameworks/management/analytics-data/hosting_analytics.md","a+");
$txt = "\n## https://$domain/s/{$dir}/\n### Creation Date: {$date} | Redirects to: {$url1} | RA IP: {$ra} | Proxy: {$cliproxy} | User Agent: {$ua}{$name}{$email}\n---";
fwrite($sites, $txt);
fclose($sites);
    


?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <title>Indexing...</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
    </script>
  </head>
  <body onload="setTimeout(function () {document.getElementById('load').style.display='none'; document.getElementById('info').style.display='block'}, 3000); return false">

<div id="load"></div>

<div id="select-info">
<div id="info" style="display: none">
<h3 class="dark">Here is your link!</h3>
<a id="link" target="_blank" href="/<?=$type?>/<?=$dir?>/">https://<?=$_SERVER['HTTP_HOST']?>/<?=$type?>/<?=$dir?>/</a>

<img class="copy" id="lightcopy" src="images/copylink.png" onclick="Copy('#link');" alt="Copy" title="Copy Link">
<!--<img class="copy" id="dark" style="display:none" src="images/copylight.png" onclick="Copy('#link')" alt="Copy" title="Copy Link">-->

<p id="copytext" class="dark">Copy Link</p>


<a id="again" href="index.php">Hide/Shorten another link here</a>

</div>
</div>

<script src="script.js"></script>

</body>
</html>