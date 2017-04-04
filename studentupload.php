<?php


if($_SERVER['REQUEST_METHOD']=="POST")
{
	$course=$_POST['course_id'];
	$instructor_id=$_POST['instructor_id'];
	$stdid=$_POST['student_id'];
	$towho=$_POST['towho'];
	       
       
	
if(isset($_FILES['file']))
{
	
	$errors=array();
	$file_name=$_FILES['file']['name'];
	$file_size=$_FILES['file']['size'];
	$file_tmp=$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$file_ext=@strtolower(end(explode('.',$file_name)));

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
		
		require "functions/functions.php";
		$sql="SELECT * from assignment where course_id=$course and instructor_id=$instructor_id and assignment='$file_name' and towho=2";
		$query=$coursemgt->calldb()->query($sql);
		
		foreach ($query as $data) {
			$deadline=$data['deadline'];
		}
			
		
		if(date("Y-m-d") <= $deadline)
		{
		move_uploaded_file($file_tmp, "document/".$file_name);
		
		
		
		$sql="INSERT INTO assignment(assignment,student_id,instructor_id,course_id,towho,datesubmitted) VALUES ('$file_name',$stdid,$instructor_id,$course,$towho,date(now()))";
		
		$query=$coursemgt->calldb()->query($sql);
		
		
			header("Location:student.php");
		
		}
		else
		{

			?>
			<h3 style="background-color: red;">Submission date exceeded!!!</h3>
			<p>Click here to go back to previous page <a href="student.php">Student page</a></p>
			<?php
		}
	}
	else
	{
		print_r($errors); 
		
	}

	}
}

?>