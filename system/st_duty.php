<?php
include "db_conn.php";
session_start();

$stdh_query = "SELECT * FROM st_dutyhours";

$result = mysqli_query($conn, $stdh_query);
 ?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> Student </title>
    <link rel = "stylesheet" href = "css/style_st_duty.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class = "box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <h2><b>HK Duty Hours Monitoring System</b></h2>
            <h1> STUDENT </h1>
            <h5><?php echo $_SESSION['st_id'] ?></h5>
        </div>

        <button type="btn_exit" onclick="window.location.href='st_main.php'"><i class="fas fa-sign-out-alt"></i>Back</button>
        
        <div class="article">
            <table id="St_table">
                <tr class="header">
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Rendered Hours</th>
                    <th>Remaining Duty Hours</th>
                </tr>
                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php echo $row['st_date']; ?></td>
                    <td><?php echo $row['st_timein']; ?></td>
                    <td><?php echo $row['st_timeout']; ?></td>
                    <td><?php echo $row['st_renderhr']; ?></td>
                    <td><?php echo $row['st_remainhr']; ?></td>      
                </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>