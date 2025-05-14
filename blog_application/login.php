<?php
include 'connection.php'; // Include database connection info

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form values
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  // check credentials
  if ($username === 'username' && $password === 'password') {
    setcookie('login_okay', 'yes', time() + 3600); // Set cookie for 1 hr
    $loggedIn = true;
  } else {
    // Display error msg if credentials are incorrect
    $error = "Username or password is incorrect. Please go back and <a href='login.html'>login</a>.";
  }
} else {
  // Display error msg if request method is NOT POST
  $error = "Access denied. Please use the <a href='login.html'>login</a> form.";
}
?>
<!DOCTYPE html>
<!-- Emma Bui, Assignment 13 -->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login Page Check</title>
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
      width: 500px;
      margin: 50px 0;
      list-style-type: none;
      padding: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .flexcontainer li {
      width: 120px;
      padding: 20px;
      text-align: center;
      background-color: #ccc;
      border: 1px solid #000;
    }
    .flexcontainer a {
      text-decoration: none;
      color: #000;
      font-size: 1.2em;
      display: block;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php elseif (isset($loggedIn) && $loggedIn): ?>
    <header>
      <h1>Our Blog</h1>
    </header>
    <nav>
      <ul class="flexcontainer">
        <li><a href="form.php">Create a Post</a></li>
        <li><a href="blog_home.php">View all Posts</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  <?php endif; ?>
</body>
</html>
