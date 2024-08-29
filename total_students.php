<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Total Students - PresencePro</title>
<style>
  body {
    background-color: #121212;
    color: #ffffff;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
  }
  .container {
    padding: 20px;
  }
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background: linear-gradient(45deg, #1f4037, #99f2c8);
  }
  .logo {
    font-size: 24px;
    font-weight: bold;
  }
</style>
</head>
<body>

<div class="header">
  <div class="logo">PresencePro</div>
</div>

<div class="container">
  <h2>Total Students</h2>

  <?php
  $servername = "localhost";
  $username = "dreamclo_dev";
  $password = "dreamclo_dev";
  $dbname = "dreamclo_dev";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to count the total number of students
  $sql = "SELECT COUNT(*) AS total_students FROM students";
  $result = $conn->query($sql);

  if ($result) {
    $row = $result->fetch_assoc();
    echo "<p>Total number of students: " . $row['total_students'] . "</p>";
  } else {
    echo "<p>Error retrieving data.</p>";
  }

  $conn->close();
  ?>

</div>

</body>
</html>
