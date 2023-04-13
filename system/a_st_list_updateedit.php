<?php
	include('db_conn.php');
	$id=$_GET['st_id'];

    $st_name = $_POST['st_name'];
    $st_yr = $_POST['st_yr']; 
    $st_course = $_POST['st_course']; 
    $st_hktype = $_POST['st_hktype'];
    $st_email = $_POST['st_email'];

	mysqli_query($conn,"UPDATE `student_pfp` set st_name='$st_name', st_yr='$st_yrlvl',st_course='$st_course',st_hktype='$st_hktype',st_email='$st_email' where st_id='$id'");
	header('location:a_st_list.php');
?>