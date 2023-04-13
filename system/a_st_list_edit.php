<?php
	include('db_conn.php');
	$id=$_GET['st_id'];
	$query=mysqli_query($conn,"SELECT * FROM `student_pfp` where st_id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="css/style_a_add.css">
</head>
<body>
	<h2>Edit Student Profile</h2>
    
    <div class="section" id="editForm">
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <label>Student ID</label><input type="text" value="<?php echo $row['st_id']; ?>" name="st_id">
            <label>Student Name</label><input type="text" value="<?php echo $row['st_name']; ?>" name="st_name">
            <label>Year Level</label><input type="text" value="<?php echo $row['st_yr']; ?>" name="st_yr">
            <label>Course</label><input type="text" value="<?php echo $row['st_course']; ?>" name="st_course">
            <label>HK Type</label><input type="text" value="<?php echo $row['st_hktype']; ?>" name="st_hktype">
            <label>Email</label><input type="text" value="<?php echo $row['st_email']; ?>" name="st_email">
            <input type="submit" name="submit">
            <a href="a_st_list.php">Back</a>
        </form>
    </div>
</body>
</html>