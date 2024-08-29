<?php
$servername = "localhost";
$username = "dreamclo_dev";
$password = "dreamclo_dev";
$dbname = "dreamclo_dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from POST request
$uid = $_POST['uid'];
$name = $_POST['name'];
$class = $_POST['class'];
$roll_no = $_POST['roll_no'];
$phone_no = $_POST['phone_no'];
$time_in = $_POST['time_in'];
$time_out = $_POST['time_out'];
$gate = $_POST['gate'];

// Insert data into database
$sql = "INSERT INTO attendance (uid, name, class, roll_no, phone_no, time_in, time_out, gate) 
        VALUES ('$uid', '$name', '$class', '$roll_no', '$phone_no', '$time_in', '$time_out', '$gate')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
