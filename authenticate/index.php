<?php
$domain = $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta name="description" content="Sign into ZapURL!">
    <meta name="keywords" content="URL,Zap,ZapURL,Shortener">
    <title>Login | ZapURL</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div id="auth-container">
      <a href="https://<?=$domain?>/">&lt; Back to Home</a>
      <h1>Authenticate</h1>
      <p>This form does not create an account. We only use this information to keep track of our custom links. Authenticating will unlock features, like the ability to create custom URL's. Please put a valid email and name. These credentials will not be shown to the public. We will use this information keep track of abuse of our Custom URL System<sup>*</sup>, use it to assist you when you report problems with our site.</p>

      <form id="auth" action="//<?=$domain?>/" method="POST">
        <input type="email" placeholder="example@example.com" name="email" class="type-in" required /><br />
        <input type="text" placeholder="Name" name="name" class="type-in" required /><br />
        <input type="submit" value="Continue" class="button-in" />
      </form>
    </div>
  </body>
</html>