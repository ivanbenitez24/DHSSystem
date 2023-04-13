<?php
include "db_conn.php";
session_start();

$std_query = "SELECT * FROM student_pfp";

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
            <input type="text" id="St_Input" onkeyup="myFunction()" placeholder="Search student id..." title="Type in a name">
            <table id="St_table">
                <tr class="header">
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Year Level</th>
                    <th>Course</th>
                    <th>HK Type</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <tr>
            <?php
                $std_query = "SELECT * FROM student_pfp";
                $result = mysqli_query($conn, $std_query);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <td><?php echo $row['st_id']; ?></td>
                    <td><?php echo $row['st_name']; ?></td>
                    <td><?php echo $row['st_yr']; ?></td>
                    <td><?php echo $row['st_course']; ?></td>
                    <td><?php echo $row['st_hktype']; ?></td>
                    <td><?php echo $row['st_email']; ?></td>
                    <td>
                        <a href="a_st_list_edit.php?id=<?php echo $row['st_id']; ?>">Edit</a>
                        <a href="a_st_list_del.php?id= <?php echo $row['st_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php
                }
            ?>
            </table>
        </div>     
    </div>
</body>
</html>