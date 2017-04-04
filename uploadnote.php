<?php


if($_SERVER['REQUEST_METHOD']=="POST")
{
	$course=$_POST['course_id'];
	$deptid=$_POST['department_id'];

	
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
			$sql="SELECT * from lecturenotes where lecturenote='$filename' and department_id=$deptid and course_id=$course";
			$query=$coursemgt->calldb()->query($sql);

			if($query->rowcount()>0)
			{
				echo 'File already exists';
			}
			else
			{
				$sql="INSERT INTO lecturenotes (department_id,course_id,lecturenote) VALUES ($deptid,$course,'$filename')";

			$query=$coursemgt->calldb()->query($sql);
			}
			


			header("Location:instructor.php");



		}
		else
		{
			print_r($errors);

		}

	}
}

?>