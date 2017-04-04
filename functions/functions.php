<?php
require 'models/database.php';
class coursemgt
{

	public  function calldb()
	{
		$pdo=Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public  function closedb()
	{
		Database::disconnect();
	}



public  function selectoption($table,$column,$value)
{ 
	$sql="SELECT * FROM $table";
	$rquery=$this->calldb()->query($sql);
	
	foreach ($rquery as $data) 
	{
		echo'<option value="'.$data[$value].'">'.$data[$column].'</option>';
	}
}


	public  function viewintable($tablename)
	{

		$sql="SELECT * FROM $tablename";
	
	    $query=$this->calldb()->prepare($sql);
		$query->execute();
		return $query;
	   
	}

	public  function delete($tablename,$idintable,$id)
	{
		
		$sql="DELETE FROM $tablename WHERE $idintable=$id";
		$query=$this->calldb()->query($sql);
	}



	public function departmentalcourses()
	{
		if(isset($_REQUEST['seecoursenotes']))
		{


		$dept_id=$_REQUEST['department'];
	    
		

		$sn=1;
		$sql="SELECT * from lecturenotes,courses where lecturenotes.department_id=$dept_id and courses.department_id=lecturenotes.department_id and courses.course_id=lecturenotes.course_id";
		$query=$this->calldb()->query($sql);
		foreach ($query as $data) {
			$filename=$data['lecturenote'];
			?>
			<tr>
				<td><?php echo $sn;?></td>
				<td><?php echo $data['course_code']?></td>
				<td><?php echo $data['course_name']?></td>
				<td>
					<form action='download.php' method='post'>
						<input type='hidden' name='file' value="<?php echo 'document/'.$filename;?>">
						<button type='submit'>Download</button>

					</form>
				</td>
			</tr>
			<?php
			$sn+=1;
		}
	 }
	}

public function changepassword()
{
	if(isset($_POST['change']))
	{
		$username=$_POST['username'];
		$oldpword=$_POST['oldpword'];
		$newpword=$_POST['newpword'];
		$confirmpword=$_POST['confirm'];

		if($confirmpword==$newpword)
		{

		$sql="SELECT * FROM user where username='$username' and password='$oldpword'";
		$query=$this->calldb()->query($sql);
		$count=$query->rowCount();
		if ($count==1)
		{
			$sql="UPDATE user set password='$newpword' where username='$username' and password='$oldpword'";
			$query=$this->calldb()->query($sql);
			$count=$query->rowCount();
			if($count==1)
				{echo "<h4 style='color:green;'>Password successfully updated</h4>";}
			else
			{
				echo "<h5 style='color:red'>Password couldnt not be updated due to some errors, try again</h5>";
			}
		}
		else
		{
				echo "<h5 style='color:red'>Either password is incorrect or user does not exist, try again</h5>";
		}

	    }
	    else
	    {
	    	echo "<h5 style='color:red'>The passwords do not match</h5>";
	    }
	}
}


}
$coursemgt=new coursemgt;



?>