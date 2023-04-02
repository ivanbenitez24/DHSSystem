<?php
  include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title> Admin </title>
  <link rel="stylesheet" href="css/style_a_add.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
  <div class="box">
    <div class="nav">
      <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
      <h2><b>HK Duty Hours Monitoring System</b></h2>
      <h1> ADMIN </h1>  
    </div>
      
    <button type="btn_exit" onclick="window.location.href='a_main.php'">Back</button>
      
    <div class="section" id="addForm">
      <form action="#" method="Post" class="form-container">
        <h2>Add New HK Student</h2>
          <input type="text" placeholder="Enter Student ID" id="st_id" name="st_id">
          <input type="text" placeholder="Enter Student Name" id="st_name" name="st_name">
          <input type="text" placeholder="Enter Student Email" id="st_email" name="st_email">
          <input type="password" placeholder="Enter Password" id="st_pass" name="st_pass">
          <br>
          <select id="st_crs" name="st_crs">
            <option value="">Select Course</option>
            <option value="BSIT">BSIT</option>
            <option value="BS Criminology">BS Criminology</option>
            <option value="BSBA">BSBA</option>
            <option value="BSTM">BSTM</option>
          </select>
          <select id="st_yrlvl" name="st_yrlvl">
            <option value="">Select Year Level</option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
          </select>
          <select id="st_hktype" name="st_hktype">
            <option value="">Select HK Type</option>
            <option value="HK25">HK25</option>
            <option value="HK50">HK50</option>
            <option value="HK75">HK75</option>
            <option value="HK100">HK100</option>
          </select>
          <select id="st_duty" name="st_duty">
            <option value="">Select Assigned Duty</option>
            <option value="Student Facilitator">Student Facilitator</option>
            <option value="Student Roaming">Student Roaming</option>
            <option value="CSDL Assistant">CSDL Assistant</option>
          </select>
          <br>
          <input type="text" placeholder="Enter Assigned Department" id="st_room" name="st_room">
          <input type="text" placeholder="Enter Assigned Day" id="st_aday" name="st_aday">
          <input type="text" placeholder="Enter Assigned Time" id="st_atime" name="st_atime">
          <button type="submit" class="btn" name="add" id="add">ADD</button>
      </form> 
    </div> 
      <script>
      function validateForm() {
        var st_id = document.forms["addForm"]["st_id"].value;
        var st_name = document.forms["addForm"]["st_name"].value;
        var st_email = document.forms["addForm"]["st_email"].value;
        var st_pass = document.forms["addForm"]["st_pass"].value;
        var st_crs = document.forms["addForm"]["st_crs"].value;
        var st_yrlvl = document.forms["addForm"]["st_yrlvl"].value;
        var st_hktype = document.forms["addForm"]["st_hktype"].value;
        var st_duty = document.forms["addForm"]["st_duty"].value;
        var st_room = document.forms["addForm"]["st_room"].value;
        var st_aday = document.forms["addForm"]["st_aday"].value;
        var st_atime = document.forms["addForm"]["st_atime"].value;
      
        if (st_id == "" || st_name == "" || st_email == "" || st_pass == "" || st_crs == "" || st_yrlvl == "" || st_hktype == "" || st_duty == "" || st_room == "" || st_aday == "" || st_atime == "") {
          alert("All fields must be filled out");
          return false;
        }
      }
      </script>
          
      <?php
        if (isset($_POST['submit'])) {
          $st_id = $_POST['st_id'];
          $st_name = $_POST['st_name'];
          $st_email = $_POST['st_email'];
          $st_pass = $_POST['st_pass'];
          $st_crs = $_POST['st_crs'];
          $st_yrlvl = $_POST['st_yrlvl'];
          $st_hktype = $_POST['st_hktype'];
          $st_duty = $_POST['st_duty'];
          $st_room = $_POST['st_room'];
          $st_aday = $_POST['st_aday'];
          $st_atime = $_POST['st_atime'];
          
          // Insert the student details into the student_pfp table
          $insert_student = "INSERT INTO student_pfp (st_id, st_pass, st_name, st_yr, st_course, st_hktype, st_email) VALUES ('$st_id', '$st_pass', '$st_name', '$st_yrlvl', '$st_crs', '$st_hktype', '$st_email')";
          if(mysqli_query($conn, $insert_student)) {
            // Get the ID of the newly inserted student
            $student_id = mysqli_insert_id($conn);
            
            // Insert the duty assignment into the duty_assignment table using the student ID
            $insert_duty = "INSERT INTO st_duties (st_id, st_duty, st_room, st_day, st_timehours) VALUES ('$st_id', '$st_duty', '$st_room', '$st_aday', '$st_atime')";
            if(mysqli_query($conn, $insert_duty)) {
              // Display success message
              echo "<script>alert('Successfully Added.')</script>";
            } else {
              // Display error message
              echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
          } else {
            // Display error message
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
          }
        }
      ?>
  </div>
</body>
</html>
