<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Attendance - PresencePro</title>
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
</style>
</head>
<body>

<div class="header">
  <div class="logo">PresencePro</div>
</div>

<div class="container">
  <h2>Attendance Records</h2>
  <table id="attendanceTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Roll No.</th>
        <th>Phone No.</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Gate</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dynamic content will be loaded here -->
    </tbody>
  </table>
</div>

<script>
document.addEventListener('mousemove', (e) => {
  document.body.style.background = `radial-gradient(circle at ${e.clientX}px ${e.clientY}px, #1f4037, #121212)`;
});

function fetchAttendanceData() {
  fetch('attendance.php')
    .then(response => response.json())
    .then(data => {
      const tableBody = document.getElementById('attendanceTable').getElementsByTagName('tbody')[0];
      tableBody.innerHTML = '';
      data.forEach(record => {
        const row = tableBody.insertRow();
        Object.values(record).forEach(text => {
          const cell = row.insertCell();
          cell.textContent = text;
        });
      });
    })
    .catch(error => console.error('Error fetching attendance data:', error));
}

// Fetch data on page load
window.onload = fetchAttendanceData;
</script>

</body>
</html>
