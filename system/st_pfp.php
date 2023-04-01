<?php
include "db_conn.php";
session_start();

$stp_query = "SELECT student_pfp.st_id, st_duties.st_duty, st_duties.st_room, st_duties.st_day, st_duties.st_time
FROM student_pfp, st_duties
WHERE student_pfp.st_id = st_duties.st_id
ORDER BY student_pfp.st_id;";

$result = mysqli_query($conn, $stp_query);
 ?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> Student </title>
    <link rel = "stylesheet" href = "css/style_st_pfp.css">
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

        <div class="card">
            <h1><?php echo $_SESSION['st_name'] ?></h1>
            <p><?php echo $_SESSION['st_id'] ?></p>
            <p><?php echo $_SESSION['st_course'] ?> <?php echo $_SESSION['st_yr'] ?></p>
            <p><?php echo $_SESSION['st_hktype'] ?></p>
            <p><?php echo $_SESSION['st_email'] ?></p>
        </div>

        <div class="article">
            <table id="St_table">
                <tr class="header">
                    <th>Assigned Duty</th>
                    <th>Department/Room</th>
                    <th>Day</th>
                    <th>Time</th>
                </tr>
                <tr>
                <?php
                        $row = mysqli_fetch_assoc($result)
                    ?>
                    <td><?php echo $row['st_duty']; ?></td>
                    <td><?php echo $row['st_room']; ?></td>
                    <td><?php echo $row['st_day']; ?></td>
                    <td><?php echo $row['st_time']; ?></td>        
                </tr>
            </table>
        </div>

        <button type="btn_exit" onclick="window.location.href='st_main.php'">Back</button>
    </div>
</body>
</html>