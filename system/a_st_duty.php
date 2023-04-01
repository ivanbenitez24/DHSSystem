<?php
include "db_conn.php";
session_start();

$std_query = "SELECT login_student.st_id, login_student.st_duty, duty_student.st_room, duty_student.st_day, duty_student.st_time1, duty_student.st_time2
FROM login_student, duty_student
WHERE login_student.st_id = duty_student.st_id
ORDER BY login_student.st_id;";

$result = mysqli_query($conn, $std_query);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <link rel="stylesheet" href="css/style_a_st_duty.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <h2><b>HK Duty Hours Monitoring System</b></h2>
            <h1> ADMIN </h1>
            
        </div>

        <button type="btn_exit" onclick="window.location.href='a_main.php'"><i class="fas fa-sign-out-alt"></i>Back</button>

        <div class="article">
            <input type="text" id="St_Input" onkeyup="myFunction()" placeholder="Search for room..." title="Type in a name">
            <table id="St_table">
                <tr class="header">
                    <th>Room/Department</th>
                    <th>Student ID</th>
                    <th>Assigned Duty</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Rendered Hours</th>
                    <th>Remaining Duty Hours</th>
                </tr>
                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <td><?php echo $row['st_room']; ?></td>
                    <td><?php echo $row['st_id']; ?></td>
                    <td><?php echo $row['st_duty']; ?></td>
                    <td><?php echo $row['st_day']; ?></td>
                    <td><?php echo $row['st_time']; ?></td>
                    <td><?php echo $row['st_render']; ?></td>
                    <td><?php echo $row['st_remain']; ?></td>
                </tr>
                    <?php
                        }
                    ?>
            </table>
            <script>
                function myFunction() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("St_Input");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("St_table");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            }
                            else {
                                tr[i].style.display = "none";
                            }
                        }       
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>