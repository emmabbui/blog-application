<?php
// Check if the request is sent from the form
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve and sanitize form data
  $blogtitle = isset($_POST['blogtitle']) ? trim(htmlspecialchars($_POST['blogtitle'])) : '';
  $blogentry = isset($_POST['blogentry']) ? trim(htmlspecialchars($_POST['blogentry'])) : '';

  // Escape any possible quotes in the form elements
  $blogtitle = addslashes($blogtitle);
  $blogentry = addslashes($blogentry);

  // Database connection parameters
  $dsn      = "mysql:host=localhost;dbname=myblog";
  $username = "root";
  $password = "";

  try {
    // Connect to the database
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the SQL INSERT statement
    $sql  = "INSERT INTO my_table (Title, Entry) VALUES (:title, :entry)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':title', $blogtitle, PDO::PARAM_STR);
    $stmt->bindParam(':entry', $blogentry, PDO::PARAM_STR);

    // Execute the prepared statement
    $stmt->execute();

    // Close the connection
    $conn = null;

    // Set success message
    $message = "<p>Blog post successfully entered! You may see your entry <a href='blog_home.php'>here</a>.</p>";
  } catch (PDOException $e) {
    // Set error message if an error occurs
    $message = "<p>An error occurred: " . $e->getMessage() . "</p>";
  }
} else {
  // Set message for direct access attempt
  $message = "<p>Access denied! <a href='login.html'>Go back to login</a>.</p>";
}
?>
<!doctype html>
<!-- Emma Bui, Assignment 13 -->
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Form</title>
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

      p {
        font-size: 1.2em;
      }

      a {
        color: blue;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    </style>
  </head>

  <body>
    <header>
      <h1>Process Blog Post</h1>
    </header>
    <main>
      <?php
      // Display the message
      echo $message;
      ?>
    </main>
  </body>

</html>