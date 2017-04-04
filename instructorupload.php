<?php


if($_SERVER['REQUEST_METHOD']=="POST")
{
	$course=$_POST['course_id'];
	$instructor_id=$_POST['instructor_id'];
	$stdid=$_POST['student_id'];
	$towho=$_POST['towho'];
	$deadline=$_POST['deadline'];
	       
       
	
if(isset($_FILES['file']))
{
	
	$errors=array();
	$file_name=$_FILES['file']['name'];
	$file_size=$_FILES['file']['size'];
	$file_tmp=$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$file_ext=strtolower(end(explode('.',$file_name)));

	$extensions=array("pdf","doc","docx","rar","zip","txt");
	if(in_array($file_ext, $extensions)===false)
	{
		$errors[]="file type is not allowed";
	}
	if($file_size>300000)
	{
		$errors[]="file size must be exactly 1mb";
	}
	if (empty($errors)==true) {
		move_uploaded_file($file_tmp, "document/".$file_name);
		require "functions/functions.php";
		
		$sql="INSERT INTO assignment(assignment,student_id,instructor_id,course_id,towho,dateposted,deadline) VALUES ('$file_name',$stdid,$instructor_id,$course,$towho,date(now()),'$deadline')";
		echo $sql;
		$query=$coursemgt->calldb()->query($sql);

				header("Location:instructor.php");
		
	
	}
	else
	{
		print_r($errors);
		
	}

	}
}

?>