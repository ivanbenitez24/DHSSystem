<?php
session_start();
include "db_conn.php";

if(isset($_POST['admin_user']) && isset($_POST['admin_pass'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $uname_admin = validate($_POST['admin_user']);
    $pass_admin = validate($_POST['admin_pass']);

    if(empty($uname_admin)){
        header("Location: admin.php?error=Username is required.");
        exit();
    }
    else if(empty($pass_admin)){
        header("Location: admin.php?error=Password is required.");
        exit();
    }
    else{
        $sql = "SELECT * FROM admin WHERE admin_user='$uname_admin' AND admin_pass='$pass_admin'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['admin_user'] === $uname_admin && $row['admin_pass'] === $pass_admin){
                $_SESSION['admin_user'] = $row['admin_user'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: a_main.php");
                exit();
            }
            else{
                header("Location: admin.php?error=Incorrect Username or Password.");
                exit();
            }
        }
        else{
            header("Location: admin.php?error=Incorrect Username or Password.");
            exit();
        }
    }
}
else{
    header("Location: admin.php");
    exit();
}