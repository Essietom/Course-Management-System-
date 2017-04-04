<?php
	
	session_start();
	
	
	if(!isset($_SESSION['SESS_USER_ID']) || (trim($_SESSION['SESS_USER_ID']) == '')) {
		header("location:index.php");
		exit();
	}
	$id=$_SESSION['SESS_USER_ID'];
	$role=$_SESSION['SESS_USER_ROLE'];
	
?>