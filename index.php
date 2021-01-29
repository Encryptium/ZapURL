<!--

Copyright 2021 Jonathan Wang

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

-->

<?php
session_start();
$domain = $_SERVER['HTTP_HOST'];


if (empty($_GET)) {
  $url = "";
  $errorMSG = "";

} else {
  $errorMSG = $_GET['error'];
  $url = $_GET['url'];

  if ($errorMSG == "emptyrequest") {
    $errorMSG = "[ERROR] URL cannot be empty.";
  }

  else if ($errorMSG == "host") {
    //$errorMSG = "[ERROR] Why do you want to change the URL of the URL changer? Stupid. Anyway, 'You cannot change the URL of the HOST'";
    $errorMSG = "[ERROR] Cannot shorten an already shortened or host URL.";
  }

  else if ($errorMSG == "invalidprotocol") {
    $errorMSG = "[ERROR] The URL format was incorrect. If you typed in your URL manually, check it to make sure it is valid.";
  }

  else if ($errorMSG == "at") {
    $errorMSG = "[Rejection Error] The custom URL is already taken";
  }

  else if ($errorMSG == "emptycustom") {
    $errorMSG = "[Rejection Error] Custom URL cannot be empty. Deselect it if you don't want to use custom.";
  }

  else if ($errorMSG == NULL){
    $errorMSG = "";
  }

  else {
    $errorMSG = "[ERROR] Unknown error has occured while changing your URL.";
  }
}

if (!empty($_POST)) {
  if (!empty($_POST['email']) && !empty($_POST['name'])) {
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["name"] = $_POST['name'];
    $sessionEmail = $_SESSION["email"];
    $sessionName = $_SESSION["name"];
    $hide = "hide";
    $show = "show";
  } else {
    session_destroy(); 
    $sessionEmail = NULL;
    $sessionName = NULL;
    $hide = "show";
    $show = "hide";
  }
} else {

    if (!empty($_SESSION)) {
      $sessionEmail = $_SESSION["email"];
      $sessionName = $_SESSION["name"];
      $hide = "hide";
      $show = "show";
    } else {
      $sessionEmail = NULL;
      $sessionName = NULL;
      session_destroy();
      $hide = "show";
      $show = "hide";
    }
}


?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta name="description" content="Free Online URL Shortener">
    <meta name="keywords" content="URL,Zap,ZapURL,Shortener">
    <title>URL</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="icon" type="image/svg" sizes="864x864" href="images/favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

  <a href="authenticate/" class="auth-btn <?=$hide?>">Authenticate</a>

  <form method="POST">
    <button type="submit" class="auth-btn <?=$show?>" name="logout">Log Out</button>
  </form>

  <div class="top-right <?=$show?>">
    <button onclick="dropDown('dropdown1')" class="dropbtn">Hello <?=$sessionName?> <span id="down-arrow">►</span></button>
    <div id="dropdown1" class="dropdown-content">
      <form action="#" method="POST">
        <button type="submit" class="dropdown-select <?=$show?>" name="logout">Logout</button>
      </form>
    </div>
    </select>
  </div>


  <div class="position-all">
  <h1 class="gradient-text">Zap Your URL here!</h1>
  <p id="parent"></p>

  <p id="error" onclick="Copy('#error')" class="click"><?=$errorMSG?></p>
  <p id="copyerror"></p>

  <div id="enter">
    <form action="create.php" method="POST">
      <input class="type-in" type="url" name="urlin" placeholder="Enter URL Here!" value="<?=$url?>"><br /><br />
      <div class="<?=$show?>">
        <label>Select Custom URL Directory</label><br />
        <input type="checkbox" name="custom" id="cu-sel" /><br /><br />
        <div class="hide" id="cu-dir">
          <label>Name of Custom Directory</label><hr />
          <label>https://<?=$domain?>/c/ </label>
          <input class="button-in" name="cusurl" placeholder="Custom Directory Name">
          <input class="hide" value="<?=$sessionName?>" />
          <input class="hide" value="<?=$sessionEmail?>" />
        </div>
      </div>
      <input type="submit" class="button-in" value="Zap!" />
    </form>
  </div>
  </div>

  <script src="sys/Frameworks/management/time-alert.management.js"></script>
  <script src="script.js"></script>
  <script src="dropdown.js"></script>
  </body>
</html>