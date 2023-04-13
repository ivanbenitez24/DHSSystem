<?php
	include('db_conn.php');
	$id = $_GET['st_id'];
	$query=mysqli_query($conn,"SELECT * FROM `student_pfp` where st_id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Admin </title>
    <link rel="stylesheet" href="css/style_a_st_list_edit.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
<div class="box">
    <div class="nav">
        <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
        <h2><b>HK Duty Hours Monitoring System</b></h2>
        <h1> ADMIN </h1>
        
    </div>
	
    <div class="section" id="editForm">
        <h2>Edit Student Profile</h2>
        <form class="form" method="POST" action="update.php?id=<?php echo $id; ?>">
            <label>Student Name :</label><input type="text" value="<?php echo $row['st_name']; ?>" name="st_name"><br>
            <label>Year Level :</label><input type="text" value="<?php echo $row['st_yr']; ?>" name="st_yr"><br>
            <label>Course :</label><input type="text" value="<?php echo $row['st_course']; ?>" name="st_course"><br>
            <label>HK Type :</label><input type="text" value="<?php echo $row['st_hktype']; ?>" name="st_hktype"><br>
            <label>Email :</label><input type="text" value="<?php echo $row['st_email']; ?>" name="st_email"><br>
            <input type="submit" name="submit"><br>
        </form>
        <button type="btn_exit" onclick="window.location.href='a_st_list.php'">Back</button>
    </div>
</div>
</body>
</html>