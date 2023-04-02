<?php
include "db_conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> Student Duty </title>
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
                    <th>Total Duty Hours</th>
                </tr>
                <?php
                $st_idnum = $_SESSION['st_id'];
                $stdh_query = "SELECT * FROM st_time WHERE st_id = $st_idnumn";
                $result = mysqli_query($conn, $stdh_query);

                    while($row = mysqli_fetch_assoc($result)){
                    $time_in = strtotime($row['st_timein']);
                    $time_out = strtotime($row['st_timeout']);
                    $total_hours = ($time_out - $time_in) / 3600;
                    $rendered_hours = min($total_hours, 90); // assume max duty hours is 90
                    
                    // Format hours and minutes
                    $rendered_hours_fmt = sprintf('%02d:%02d', floor($rendered_hours), ($rendered_hours - floor($rendered_hours)) * 60);
                
                    // Calculate total duty hours by adding rendered hours to previous row's total duty hours
                    $total_duty_hours_fmt = $rendered_hours_fmt;
                    if (isset($prev_total_duty_hours)) {
                        $total_duty_hours_sec = strtotime($prev_total_duty_hours) + strtotime($rendered_hours_fmt);
                        $total_duty_hours_fmt = date('H:i', $total_duty_hours_sec);
                    }
                    $prev_total_duty_hours = $total_duty_hours_fmt;
                   
                ?>
                <tr>
                    <td><?php echo $row['st_date']; ?></td>
                    <td><?php echo $row['st_timein']; ?></td>
                    <td><?php echo $row['st_timeout']; ?></td>
                    <td><?php echo $rendered_hours_fmt; ?></td>
                    <td><?php echo $total_duty_hours_fmt; ?></td>      
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>