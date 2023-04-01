<?php 
include "db_conn.php";

?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> Student </title>
    <link rel="stylesheet" href ="css/style_student.css">
</head>

<body>
<div class="box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <a href="index.php"><h2><b>HK Duty Hours Monitoring System</b></h2></a>
            <h1> STUDENT </h1>
        </div>
        
        <div class="section">
            <form class="box" action="#" method="post">
                <h1> Reset Your Password </h1>
                <input type="text" id="st_id" name="st_id" placeholder="Enter your student id"/>
                <input type="password" id="st_pass" name="st_pass" placeholder="Enter new password"/>
                <button type="btn_login" id="st_update" name="st_update">Update</button>
                <a href="student.php">Back</a>
            </form>
            <?php
                    if (isset($_POST['st_update'])){
                        if(mysqli_query($conn, "UPDATE student_pfp SET st_pass='$_POST[st_pass]' WHERE st_id='$_POST[st_id]';")){
            ?>
                    <script type="text/javascript">
                        alert("Password Updated Successfully.")
                    </script>
            <?php
                        }
                    }
            ?>
       </div>
</div>
</body>
</html>