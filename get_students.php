<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "dreamclo_dev";
$password = "dreamclo_dev";
$dbname = "dreamclo_dev";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query to fetch students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $students[] = $row;
  }
}

echo json_encode($students);

$conn->close();
?>
