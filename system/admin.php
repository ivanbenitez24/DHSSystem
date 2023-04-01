
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <link rel="stylesheet" href="css/style_admin.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <a href="index.php"><h2><b>HK Duty Hours Monitoring System</b></h2></a>
            <h1> ADMIN </h1>
        </div>
        
        <div class="section">
            <form class="box" action="a_login.php" method="post">
                <h1> LogIn </h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" id="admin_user" name="admin_user" placeholder="Enter your username"/>
                <input type="password" id="admin_pass" name="admin_pass" placeholder="Enter your password"/>
                <button type="btn_login" id="admin_login" name="admin_login">LogIn</button>
                <a href="a_forgot.php">Forgot password?</a>
            </form>
        </div>
    </div>
</body>
</html>