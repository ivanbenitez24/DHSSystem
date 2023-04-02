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
        </div>
        <script>
            var dialLines = document.getElementsByClassName('diallines');
            var clockEl = document.getElementsByClassName('clock')[0];

            for (var i = 1; i < 60; i++) {
            clockEl.innerHTML += "<div class='diallines'></div>";
            dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
            }

            function clock() {
            var weekday = [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                d = new Date(),
                h = d.getHours(),
                m = d.getMinutes(),
                s = d.getSeconds(),
                date = d.getDate(),
                month = d.getMonth() + 1,
                year = d.getFullYear(),
                    
                hDeg = h * 30 + m * (360/720),
                mDeg = m * 6 + s * (360/3600),
                sDeg = s * 6,
                
                hEl = document.querySelector('.hour-hand'),
                mEl = document.querySelector('.minute-hand'),
                sEl = document.querySelector('.second-hand'),
                dateEl = document.querySelector('.date'),
                dayEl = document.querySelector('.day');
            
                var day = weekday[d.getDay()];
            
            if(month < 9) {
                month = "0" + month;
            }
            
            hEl.style.transform = "rotate("+hDeg+"deg)";
            mEl.style.transform = "rotate("+mDeg+"deg)";
            sEl.style.transform = "rotate("+sDeg+"deg)";
            dateEl.innerHTML = date+"/"+month+"/"+year;
            dayEl.innerHTML = day;
            }

            setInterval("clock()", 100);
        </script>
        
        <div class="log">
            <form action="#" method="post">
                <input type="text" id="st_id" name="st_id" placeholder="Enter your student id">
                <button type="btn1" id="time_in" name="time_in"> TIME IN </button>
                <button type="btn2" id="time_out" name="time_out"> TIME OUT </button>
            </form>
            <?php
                if (isset($_POST['time_in'])){
                        $st_id = $_POST['st_id'];
                        date_default_timezone_set('Asia/Manila');
                        $date = date('Y-m-d');
                        $timein = date('H:i:s');

                        // check if the record exists in the database
                        $result = mysqli_query($conn, "SELECT * FROM student_pfp WHERE st_id = '$st_id'");
                        if(mysqli_num_rows($result) == 0) {
                            echo "Invalid Student ID";
                        } else {
                            if(mysqli_query($conn, "INSERT INTO st_time (st_id, st_date, st_timein) VALUES ('$st_id', '$date','$timein');")){
                ?>
                                <script type="text/javascript">
                                    alert("TimeIn Successfully.<?php $st_id - $timein ?>")
                                </script>
                <?php
                            }else{
                ?>
                                <script type="text/javascript">
                                    alert("TimeIn Unsuccessfully. Record Not Found.")
                                </script>
                <?php
                            }
                        }
                }
                 
                if (isset($_POST['time_out'])){
                        $st_id = $_POST['st_id'];
                        date_default_timezone_set('Asia/Manila');
                        $date = date('Y-m-d');
                        $timeout = date('H:i:s');
                        
                        // check if the record exists in the database
                        $result = mysqli_query($conn, "SELECT * FROM student_pfp WHERE st_id = '$st_id'");
                        if(mysqli_num_rows($result) == 0) {
                            echo "Invalid Student ID";
                        } else {
                        
                            if(mysqli_query($conn, "UPDATE st_time SET st_timeout='$timeout' WHERE st_id='$st_id' AND st_date='$date';")){
                ?>
                                <script type="text/javascript">
                                    alert("TimeOut Successfully.<?php $st_id - $timeout ?>")
                                </script>
                <?php
                            }else{
                ?>
                                <script type="text/javascript">
                                    alert("TimeOut Unsuccessfully. Record Not Found.")
                                </script>
                <?php
                            }
                        }
                }  
            ?>
    </div>
</div>
</body>
</html>
