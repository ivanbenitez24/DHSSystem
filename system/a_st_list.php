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
    <script>
        function showEditModal(id, name, year, course, hktype, email) {
            document.getElementById("edit-modal").style.display = "block";
            document.getElementById("edit-st_id").value = id;
            document.getElementById("edit-st_name").value = name;
            document.getElementById("edit-st_yr").value = year;
            document.getElementById("edit-st_course").value = course;
            document.getElementById("edit-st_hktype").value = hktype;
            document.getElementById("edit-st_email").value = email;
        }

        function hideEditModal() {
            document.getElementById("edit-modal").style.display = "none";
        }

        function deleteRow() {
            var result = confirm("Are you sure you want to delete this student record?");
            if (result) {
                <?php
                    $id = $_GET['st_id'];
                    mysqli_query($conn,"DELETE FROM `student_pfp` WHERE st_id = '$id'");
                    header('location:a_st_list.php');
                ?>
            }
        }
    </script>
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
                          <a href="#" onclick="showEditModal('<?php echo $row['st_id']; ?>', '<?php echo $row['st_name']; ?>', '<?php echo $row['st_yr']; ?>', '<?php echo $row['st_course']; ?>', '<?php echo $row['st_hktype']; ?>', '<?php echo $row['st_email']; ?>')">Edit</a>
                          <a href="#" onclick="deleteRow('<?php echo $row['st_id']; ?>')">Delete</a>
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