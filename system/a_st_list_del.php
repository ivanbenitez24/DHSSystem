<?php
	$id=$_GET['st_id'];
	include('db_conn.php');
	mysqli_query($conn,"DELETE FROM `student_pfp` where st_id='$id'");
	header('location:a_st_list.php');
?>