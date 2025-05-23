<?php
include 'connection.php'; // Include database connection information

// Check if user is logged in by checking the cookie
if (!isset($_COOKIE['login_okay'])) {
    // Display msg and stop script execution if user is not logged in
    exit("You are not logged in! <a href='login.html'>Log in to see this page!</a>");
}
?>
<!DOCTYPE html>
<!-- Emma Bui, Assignment 13 -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Enter a Blog Post</title>
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
    .flexcontainer {
      width: 350px;
      display: flex;
      justify-content: flex-start;
      margin-bottom: 25px;
    }
    .flexcontainer label {
      width: 50px;
    }
    [type=text], textarea {
      width: 280px;
    }
    [type=submit], [type=reset] {
      margin-top: 25px;
      padding: 10px;
      border: none;
      background-color: #ccc;
      width: 150px;
      font-size: 1em;
      font-weight: bold;
    }
    form {
      border-top: 1px solid #000;
      padding-top: 20px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Enter a Blog Post</h1>
  </header>
  <h2><a href="logout.php">Logout</a></h2>
  <form action="process_form.php" method="post">
    <div class="flexcontainer">
      <label for="blogtitle">Title: </label>
      <input type="text" id="blogtitle" name="blogtitle" maxlength="100" required>
    </div>
    <div class="flexcontainer">
      <label for="blogentry">Entry: </label>
      <textarea id="blogentry" name="blogentry" rows="10" cols="50" required></textarea>
    </div>
    <input type="submit" value="Submit Entry">
    <input type="reset" value="Clear Form">
  </form>
</body>
</html>
