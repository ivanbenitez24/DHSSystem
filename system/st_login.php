<?php
session_start();
include "db_conn.php";

if(isset($_POST['st_id']) && isset($_POST['st_pass'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $uid_stud = validate($_POST['st_id']);
    $pass_stud = validate($_POST['st_pass']);

    if(empty($uid_stud)){
        header("Location: student.php?error=Student ID is required.");
        exit();
    }
    if(empty($pass_stud)){
        header("Location: student.php?error=Password is required.");
        exit();
    }
    else{
        $sql = "SELECT * FROM student_pfp WHERE st_id='$uid_stud' AND st_pass='$pass_stud'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['st_id'] === $uid_stud && $row['st_pass'] === $pass_stud){
                $_SESSION['st_id'] = $row['st_id'];
                $_SESSION['st_name'] = $row['st_name'];
                $_SESSION['st_email'] = $row['st_email'];
                $_SESSION['st_course'] = $row['st_course'];
                $_SESSION['st_yr'] = $row['st_yr'];
                $_SESSION['st_hktype'] = $row['st_hktype'];
                header("Location: st_main.php");
                exit();
            }
            else{
                header("Location: student.php?error=Incorrect Username or Password.");
                exit();
            }
        }
        else{
            header("Location: student.php?error=Incorrect Username or Password.");
            exit();
        }
    }
}
else{
    header("Location: student.php");
    exit();
}