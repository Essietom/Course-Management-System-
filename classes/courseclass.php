<?php
require "functions/functions.php";
class Course extends coursemgt
{
	public function deleteCourse()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['course_id'];
			$this->delete(courses,course_id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=courses.php'/>";
		 }
	}


	public function viewCourse()
	{
		foreach($this->viewintable('courses') as $data)
        {
        	?>
       
           <tr>
           <td><?php echo $data['course_code']?></td>
           <td><?php echo $data['course_name']?></td>
           <td><?php echo $data['course_unit']?></td>
           <form action='' method='POST'>
      	   <input type='hidden' class='form-control' name='course_id' value="<?php echo $data['course_id']?>">
     	   <td><button type='submit' class='btn btn-danger' name='delete'/>DELETE</button></td>
          </form>

           </tr>
           <?php
       }
	}


	public function addCourse()
	{
		if(isset($_POST['add']))
{
 
   $coursecode=$_POST['coursecode'];
  $coursetitle=$_POST['coursetitle'];
  $courseunit=$_POST['courseunit'];
  $semester=$_POST['semesterid'];
  $deptid=$_POST['deptid'];
  $levelid=$_POST['levelid'];
  $valid=true;

  if(empty($coursecode)||empty($coursetitle)||empty($courseunit))
  {
    $valid=false;

  }
 
  if ($valid)
  {
   $sql="INSERT INTO courses (course_name,course_unit,course_code,level_id,department_id,semester_id) VALUES (?,?,?,?,?,?)";
    $query=$this->calldb()->prepare($sql);

    $query->execute(array(
                        $coursetitle,
                        $courseunit,
                        $coursecode,
                        $levelid,
                        $deptid,
                        $semester
                    )); 
  }
  else
  {
    echo "Some fields are empty";
  }
  
}
	}
}

$Course= new Course;



?>