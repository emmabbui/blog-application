<?php
include 'connection.php'; // Include database connection information

// Check if user is logged in by checking the cookie
if (!isset($_COOKIE['login_okay'])) {
    // Displays msg and stop script execution if user is not logged in
    exit("You are not logged in! <a href='login.html'>Log in to see this page!</a>");
}

// Database connection with PDO
try {
    $dsn = "mysql:host=localhost;dbname=myblog";
    $username = "root";
    $password = "";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "An error occurred: $error_message";
}

// SQL query to get blog posts results
$sql = "SELECT Title, Entry, date_entered FROM my_table ORDER BY date_entered DESC";
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>
<!DOCTYPE html>
<!-- Emma Bui, Assignment 13 -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Display Blog on Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 100%;
    }
    article {
      margin-bottom: 20px;
      width: 600px;
      padding: 10px;
    }
    article:nth-of-type(odd) {
      background-color: aliceblue;
    }
    article:nth-of-type(even) {
      background-color: floralwhite;
    }
  </style>
</head>
<body>
  <header>
    <h1>Blog Post Archive</h1>
    <h2><a href="form.php">Enter a Post</a></h2>
    <h2><a href="logout.php">Logout</a></h2>
  </header>
  <?php
  foreach ($rows as $row) {
    echo "<article>";
    echo "<p><strong>Title:</strong> " . htmlspecialchars($row['Title']) . "</p>";
    echo "<p><strong>Post:</strong> " . htmlspecialchars($row['Entry']) . "</p>";
    echo "<p><strong>Date:</strong> " . htmlspecialchars($row['date_entered']) . "</p>";
    echo "</article>";
  }
  $conn = null;
  ?>
</body>
</html>
