<?php
require "functions/functions.php";
class Admin extends coursemgt
{
	public function addstudent()
	{
		if(isset($_POST['add']))
		{

			$matno=$_POST['matno'];
			$lastname=$_POST['ln'];
			$firstname=$_POST['fn'];
			$pword=$_POST['pword'];
			$mail=$_POST['email'];
			$phonenum=$_POST['phonenum'];
			$dob=$_POST['dateofbirth'];
			$sex=$_POST['sex'];
			$role=$_POST['role'];
			$dept=$_POST['department'];
			$level=$_POST['level'];
			$valid=true;
			if(empty($matno)||empty($lastname)||empty($firstname)||empty($mail)||empty($phonenum)||empty($dob)||empty($role))
			{
				$valid=false;

			}

			if ($valid)
			{
				$sql="SELECT student_matric_no,student_email FROM student";
				$query=$this->calldb()->query($sql);
				$count=$query->rowCount();
				if($count>0)
				{
				foreach ($query as $data) {
					$existingmatno=$data['student_matric_no'];
					$existingemail=$data['student_email'];
				}
					if($existingmatno==$matno || $existingemail==$mail)
					{
						echo "<h4 style='color:red;'>A student with this matric number/email already exist!!!</h4>";
					}

				}
					else
					{


				$sql="INSERT INTO student (student_matric_no, student_firstname, student_lastname, student_email, student_phonenum, student_dob, student_sex, student_dept_id, student_level) VALUES (?, ?, ?, ?,  ?, ?, ?, ?, ?)";
				$sql2="INSERT INTO user (username,password,user_email,role) VALUES (?,?,?,?)";


				$query2=$this->calldb()->prepare($sql2);
				$query2->execute(array(
					$matno,
					$pword,
					$mail,
					$role

					));

				$query=$this->calldb()->prepare($sql);
				$query->execute(array(
					$matno,
					$lastname,
					$firstname,
					
					$mail,
					$phonenum,
					$dob,
					$sex,

					$dept,
					$level

					));
					}
				

			}
			else
			{
				echo "fill up missing fields";
			}

		}
	}


	public function deletestudent()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['student_id'];
			$this->delete(student,student_id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=studentmgt.php'/>";
		 }
	}


	public function viewstudent()
  {
    $sql="SELECT * FROM student,department,level WHERE department.department_id=student.student_dept_id and student.student_level=level.level_id";
    $query=$this->calldb()->query($sql);
    $query->execute();
    foreach($query as $data)
    {
      $student_id=$data['student_id'];
      ?>
      <tr>
      <td><?php echo $data['student_lastname']?></td>
      <td><?php echo $data['student_firstname']?></td>
      <td><?php echo $data['student_sex']?></td>  
      <td><?php echo $data['student_dob']?></td>
      <td><?php echo $data['student_matric_no']?></td>
      <td><?php echo $data['department_name']?></td>
      <td><?php echo $data['student_phonenum']?></td>  
    
      <td><?php echo $data['student_email']?></td>
      <td><?php echo $data['level']?></td>
     <td><button class='btn btn-info' data-toggle='modal' data-target="#myModal<?php echo $data['student_id']?>"><i class='fa fa-edit'></i></button></td>
     <form action='' method='POST'>
     <td><button type='submit' class='btn btn-danger' name='delete'/><i class='fa fa-trash'></i></button></td>
     <input type='hidden' class='form-control' name='student_id' value="<?php echo $data['student_id'] ?>"/>
     </form>
    </tr>
      

      <div id="myModal<?php echo $data['student_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                                  <label class=" control-label">Last name</label>
                 <input type="text" required name="lastname" class="form-control" placeholder="Surname" value="<?php echo $data['student_lastname'];?>"><br>
                 <label class="control-label">First name</label>
                 <input type="text" required name="firstname" class="form-control" placeholder="Firstname" value="<?php echo $data['student_firstname'];?>"><br>
                 <label class="control-label">Department</label>
                <select name="department" class="form-control">
              <?php $this->selectoption('department','department_name','department_id')?>
            </select><br>
                 <label class="control-label">Email address</label>
                 <input type="email" required name="email" class="form-control" placeholder="Email Address" value="<?php echo $data['student_email'];?>"><br>
                 <label class="control-label">Phone Number</label>
                 <input type="text" required name="phonenum" class="form-control" placeholder="Phone Number" value="<?php echo $data['student_phonenum'];?>"><br>

                 <input type="hidden" required value="<?php echo $data['student_id']?>" name="id" class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#myModal" name="updatestd" data-toggle="modal">update</button> 

               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <?php


    }


  }



  public function updatestudent()
{

  if(isset($_POST['updatestd']))
  {
    		
			$lastname=$_POST['lastname'];
			$firstname=$_POST['firstname'];
			
			$mail=$_POST['email'];
			$phonenum=$_POST['phonenum'];
			
			$dept=$_POST['department'];
		
    $id=$_POST['id'];


    $sql="UPDATE student SET student_firstname='$firstname', student_lastname='$lastname', student_email='$mail',student_phonenum='$phonenum',student_dept_id='$dept' WHERE student_id=$id";
    $query=$this->calldb()->query($sql);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0; url=studentmgt.php'/>";

  }
}



public function addinstructor()
	{
		if(isset($_POST['addinstructor']))
		{

			$regno=$_POST['regno'];
	$lastname=$_POST['ln'];
	$firstname=$_POST['fn'];

	$mail=$_POST['email'];
	$role=$_POST['role'];
	$phonenum=$_POST['phonenum'];
	$dob=$_POST['dateofbirth'];
	$sex=$_POST['sex'];
	$pword=$_POST['pword'];
	$dept=$_POST['department'];
	$qualification=$_POST['qualification'];
	$yrofappointment=$_POST['yrofappointment'];
	$course=$_POST['course'];
	$valid=true;

			if(empty($regno)||empty($lastname)||empty($firstname)||empty($mail)||empty($phonenum)||empty($dob)||empty($course))
			{
				$valid=false;

			}

			if ($valid)
		{

			$sql="SELECT instructor_regno,instructor_email FROM instructor";
				$query=$this->calldb()->query($sql);
				$count=$query->rowCount();
				if($count>0)
				{
				foreach ($query as $data) {
					$existingregno=$data['instructor_regno'];
					$existingemail=$data['instructor_email'];
				}
					if($existingregno==$regno || $existingemail==$mail)
					{
						echo "<h4 style='color:red;'>An Instructor with this staff number/email already exist!!!</h4>";
					}

				}
					else
					{
		$sql="INSERT INTO instructor(instructor_regno, instructor_firstname, instructor_lastname,instructor_email, instructor_phonenum, instructor_dob, instructor_sex, department_id, instructor_qualification, instructor_yr_appointed,course_id) VALUES (?,?, ?, ?,  ?, ?, ?, ?, ?, ?,?)";

		$sql2="INSERT INTO user (username,password,user_email,role) VALUES (?,?,?,?)";


		$query2=$this->calldb()->prepare($sql2);
		$query2->execute(array(
			$regno,
			$pword,
			$mail,
			$role

			));

		$query=$this->calldb()->prepare($sql);
		$query->execute(array(
			
			$regno,
			$lastname,
			$firstname,
			
			$mail,
			$phonenum,
			$dob,
			$sex,
			
			$dept,
			$qualification,
			$yrofappointment,
			$course

			));
		
	}}
			else
			{
				echo "fill up missing fields";
			}

		}
	}


	public function deleteinstructor()
	{
		if (isset($_POST['deleteinstructor']))
		 {

 	 		$id = $_POST['instructor_id'];
			$this->delete(instructor,instructor_id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=instructormgt.php'/>";
		 }
	}


	public function viewinstructor()
  {
    $sql="SELECT * FROM instructor,department WHERE department.department_id=instructor.department_id";
    $query=$this->calldb()->query($sql);
    $query->execute();
    foreach($query as $data)
    {
      $instructor_id=$data['instructor_id'];
      ?>
      <tr>
      <td><?php echo $data['instructor_lastname']?></td>
      <td><?php echo $data['instructor_firstname']?></td>
      <td><?php echo $data['instructor_sex']?></td>  
      <td><?php echo $data['instructor_dob']?></td>
      <td><?php echo $data['instructor_regno']?></td>
      <td><?php echo $data['department_name']?></td>
      <td><?php echo $data['instructor_phonenum']?></td>  
    	 <td><?php echo $data['instructor_qualification']?></td> 
    	 <td><?php echo $data['instructor_yr_appointed']?></td>
      <td><?php echo $data['instructor_email']?></td>
      
     <td><button class='btn btn-info' data-toggle='modal' data-target="#myModal<?php echo $data['instructor_id']?>"><i class='fa fa-edit'></i></button></td>
     <form action='' method='POST'>
     <td><button type='submit' class='btn btn-danger' name='deleteinstructor'/><i class='fa fa-trash'></i></button></td>
     <input type='hidden' class='form-control' name='instructor_id' value="<?php echo $data['instructor_id'] ?>"/>
     </form>
    </tr>
      

      <div id="myModal<?php echo $data['instructor_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                 <label class="control-label">First Name</label>
                 <input type="text" required name="firstname"  class="form-control" placeholder="First Name" value="<?php echo $data['instructor_firstname'];?> " ><br>
                 <label class=" control-label">Last name</label>
                 <input type="text" required name="lastname" class="form-control" placeholder="Surname" value="<?php echo $data['instructor_lastname'];?>"><br>
                 <label class="control-label">Qualification</label>
                 <input type="text" required name="qualification" class="form-control" placeholder="Qualification" value="<?php echo $data['instructor_qualification'];?>"><br>
                 <label class="control-label">Department</label>
                <select name="department" class="form-control">
              <?php $this->selectoption('department','department_name','department_id')?>
            </select><br>
                 <label class="control-label">Email address</label>
                 <input type="email" required name="email" class="form-control" placeholder="Email Address" value="<?php echo $data['instructor_email'];?>"><br>
                 <label class="control-label">Phone Number</label>
                 <input type="text" required name="phonenum" class="form-control" placeholder="Phone Number" value="<?php echo $data['instructor_phonenum'];?>"><br>

                 <input type="hidden" required value="<?php echo $data['instructor_id']?>" name="id" class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#mymodal" name="updateinstructor" data-toggle="modal">update</button> 

               </div>
             </form>

             <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <?php


    }


  }



  public function updateinstructor()
{

  if(isset($_POST['updateinstructor']))
  {
    		
			$lastname=$_POST['lastname'];
			$firstname=$_POST['firstname'];
			$qualification=$_POST['qualification'];
			$mail=$_POST['email'];
			$phonenum=$_POST['phonenum'];
			
			$dept=$_POST['department'];
			    $id=$_POST['id'];


    $sql="UPDATE instructor SET instructor_firstname='$firstname', instructor_qualification='$qualification', instructor_lastname='$lastname', instructor_email='$mail',instructor_phonenum='$phonenum',department_id='$dept' WHERE instructor_id=$id";
    $query=$this->calldb()->query($sql);
    $query->execute();
    echo "<meta http-equiv='refresh' content='0; url=instructormgt.php'/>";

  }
}
}

$Admin= new Admin;
?>