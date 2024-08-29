<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Students - PresencePro</title>
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
  .form-group {
    margin-bottom: 15px;
  }
  .form-group label {
    display: block;
    margin-bottom: 5px;
  }
  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #333;
    border-radius: 5px;
    background-color: #222;
    color: #fff;
  }
  .form-group button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
  }
  .form-group button:hover {
    background-color: #45a049;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
  }
  th {
    background-color: #333;
  }
  .delete-button {
    background-color: #e53935;
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 2px;
    cursor: pointer;
    border-radius: 5px;
  }
  .delete-button:hover {
    background-color: #c62828;
  }
</style>
</head>
<body>

<div class="header">
  <div class="logo">PresencePro</div>
</div>

<div class="container">
  <h2>Manage Students</h2>
  <form action="manage_students.php" method="POST">
    <div class="form-group">
      <label for="uid">Unique ID:</label>
      <input type="text" id="uid" name="uid" required>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="class">Class:</label>
      <input type="text" id="class" name="class" required>
    </div>
    <div class="form-group">
      <label for="roll_no">Roll No.:</label>
      <input type="text" id="roll_no" name="roll_no" required>
    </div>
    <div class="form-group">
      <label for="phone_no">Phone No.:</label>
      <input type="text" id="phone_no" name="phone_no" required>
    </div>
    <div class="form-group">
      <button type="submit" name="action" value="add">Add Student</button>
    </div>
  </form>

  <h2>Existing Students</h2>
  <table id="studentsTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Unique ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Roll No.</th>
        <th>Phone No.</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dynamic content will be loaded here -->
    </tbody>
  </table>
</div>

<script>
function fetchStudentsData() {
  fetch('get_students.php')
    .then(response => response.json())
    .then(data => {
      const tableBody = document.getElementById('studentsTable').getElementsByTagName('tbody')[0];
      tableBody.innerHTML = '';
      data.forEach(student => {
        const row = tableBody.insertRow();
        Object.values(student).forEach((text, index) => {
          const cell = row.insertCell();
          cell.textContent = text;
        });
        const actionCell = row.insertCell();
        actionCell.innerHTML = `<form action="manage_students.php" method="POST" style="display:inline;">
                                  <input type="hidden" name="uid" value="${student.uid}">
                                  <button type="submit" name="action" value="delete" class="delete-button">Delete</button>
                                </form>`;
      });
    })
    .catch(error => console.error('Error fetching students data:', error));
}

// Fetch data on page load
window.onload = fetchStudentsData;
</script>

<?php
$servername = "localhost";
$username = "dreamclo_dev";
$password = "dreamclo_dev";
$dbname = "dreamclo_dev";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $uid = $_POST['uid'];

    if ($action == 'add') {
      $name = $_POST['name'];
      $class = $_POST['class'];
      $roll_no = $_POST['roll_no'];
      $phone_no = $_POST['phone_no'];

      $sql = "INSERT INTO students (uid, name, class, roll_no, phone_no) VALUES ('$uid', '$name', '$class', '$roll_no', '$phone_no')";
      if ($conn->query($sql) === TRUE) {
        echo "<p>New student added successfully</p>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } elseif ($action == 'delete') {
      $sql = "DELETE FROM students WHERE uid='$uid'";
      if ($conn->query($sql) === TRUE) {
        echo "<p>Student deleted successfully</p>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
}

$conn->close();
?>

</body>
</html>
