<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PresencePro - Smart Attendance System</title>
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
  .nav-links {
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .nav-links a {
    color: #99f2c8;
    text-decoration: none;
    padding: 10px 20px;
    background-color: #333;
    border-radius: 5px;
    margin-right: 10px;
  }
  .nav-links a:hover {
    background-color: #1f4037;
  }
</style>
</head>
<body>

<div class="header">
  <div class="logo">PresencePro</div>
</div>

<div class="container">
  <h2>Welcome to PresencePro</h2>
  <div class="nav-links">
    <a href="manage_students.php">Manage Students</a>
    <a href="total_students.php">Total Students</a>
    <a href="attendance.php">View Attendance</a>
  </div>
</div>

</body>
</html>
