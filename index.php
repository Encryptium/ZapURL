<!--

This code was created by Jonathan2018.
Copyright (c), All Rights Reserved. 2020.\

You may not redistribute this code without the following conditions.

1. Include this copyright note. 
2. Include everything within this comment including the name and these conditions!

-->

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <title>URL</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet">
  </head>
  <body>




  <h1>Change Your URL here!</h1>
<div id="enter">
<form action="create.php" method="POST">
  <input type="url" name="urlin" placeholder="Enter URL Here!"></input>
</form>
</div>

<?php
$path = 's/';

/* foreach (glob($path.'.txt') as $file) { */
foreach (glob($path.'*') as $file) {
    
    if(time() - filectime($file) > 2592000){
      unlink($file);
    }
}
?>


<!--<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
 window.OneSignal = window.OneSignal || [];
 OneSignal.push(function() {
   OneSignal.init({
     appId: "d4040d1f-09b6-4efe-938c-1daaa74afa02",
     notifyButton: {
       enable: true,
     },
   });
 });
</script>-->

  </body>
</html>