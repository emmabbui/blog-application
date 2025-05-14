<?php
// Set cookie to expire and log user out
setcookie('login_okay', 'yes', time() - 3600);
?>
<!DOCTYPE html>
<!-- Emma Bui, Assignment 13 -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Logout</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 100%;
      background-color: floralwhite;
      padding: 20px;
    }
    h1 {
      font-size: 1.8em;
    }
  </style>
</head>
<body>
  <p>You are now logged out! <a href="login.html">Log in again</a>.</p>
</body>
</html>
