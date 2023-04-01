<?php 
include "db_conn.php";

?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> HK Duty Hours Monitoring System </title>
    <link rel="stylesheet" href="css/style_index.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class = "box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <h1><b>HK Duty Hours Monitoring System</b></h1>
            <a href="admin.php"> ADMIN </a>
            <a href="student.php"> STUDENT </a>
        </div>
   
        <div class="clock">
            <div>
                <div class="info date"></div>
                <div class="info day"></div>
            </div>
            <div class="dot"></div>
            <div>
                <div class="hour-hand"></div>
                <div class="minute-hand"></div>
                <div class="second-hand"></div>
            </div>
            <div>
                <span class="h3">3</span>
                <span class="h6">6</span>
                <span class="h9">9</span>
                <span class="h12">12</span>
            </div>
            <div class="diallines"></div>
            <script type="text/javascript" src="js/index_clock.js"></script>
        </div>

        <div class="log">
            <form action="#" method="post">
                <input type="text" id="st_id" name="st_id" placeholder="Enter your student id">
                <button type="btn1" id="time_in" name="time_in"> TIME IN </button>
                <button type="btn2" id="time_out" name="time_out"> TIME OUT </button>
            </form>
            <?php
            if (isset($_POST['time_in'])){
                $date = date('Y-m-d');
                $timein = date('08:30:16');

                if(mysqli_query($conn, "INSERT INTO st_timein (st_date, st_timein) VALUES ('$date','$timein');")){
                    ?>
                    <script type="text/javascript">
                        alert("Successfully TimeIn: Student ID - TimeIn.")
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Error Found.")
                    </script>
                    <?php
                }
            }
            ?>
            <?php
            if (isset($_POST['time_out'])){
                $date = date('Y-m-d');
                $timeout = date('10:25:30');

                if(mysqli_query($conn, "INSERT INTO st_timeout (st_date, st_timeout) VALUES ('$date','$timeout');")){
                    ?>
                    <script type="text/javascript">
                        alert("Successfully TimeOut: Student ID - TimeOut.")
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Error Found.")
                    </script>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</body>
</html>