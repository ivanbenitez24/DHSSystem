<?php 
include "db_conn.php";

?>
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <link rel="stylesheet" href ="css/style_admin.css">
</head>

<body>
<div class="box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <a href="index.php"><h2><b>HK Duty Hours Monitoring System</b></h2></a>
            <h1> ADMIN </h1>
        </div>
        
        <div class="section">
            <form class="box" action="#" method="post">
                <h1> Reset Your Password </h1>
                <input type="text" id="admin_user" name="admin_user" placeholder="Enter your username"/>
                <input type="password" id="admin_pass" name="admin_pass" placeholder="Enter new password"/>
                <button type="btn_login" id="admin_update" name="admin_update">Update</button>
                <a href="admin.php">Back</a>
            </form>
            <?php
                    if (isset($_POST['admin_update'])){
                        if(mysqli_query($conn, "UPDATE admin SET admin_pass='$_POST[admin_pass]' WHERE admin_user='$_POST[admin_user]';")){
            ?>
                    <script type="text/javascript">
                        alert("Password Updated Successfully.")
                    </script>
            <?php
                        }
                    }
            ?>
        </div>
</div>
</body>
</html>