<?php
require "functions/functions.php";
class Department extends coursemgt
{
	public function deletedepartment()
	{
		if (isset($_POST['delete']))
		 {

 	 		$id = $_POST['department_id'];
			$this->delete(department,department_id,$id);
 			echo "<meta http-equiv='refresh' content='0; url=department.php'/>";
		 }
	}


	public function viewdepartment()
	{
		foreach($this->viewintable('department') as $data)
        {
        	?>
       
           <tr>
           <td><?php echo $data['department_id']?></td>
           <td><?php echo $data['department_name']?></td>
           <td><?php echo $data['department_alias']?></td>
           <form action='' method='POST'>
      	   <input type='hidden' class='form-control' name='department_id' value="<?php echo $data['department_id']?>">
     	   <td><button type='submit' class='btn btn-danger' name='delete'/>DELETE</button></td>
          </form>

           </tr>
           <?php
       }
	}


	public function adddepartment()
	{
		if(isset($_POST['add']))
{
 
  $deptname=htmlspecialchars($_POST['departmentname']);
  $deptalias=htmlspecialchars($_POST['departmentalias']);
  
  $valid=true;

  if(empty($deptname))
  {
    $valid=false;

  }
 
  if ($valid)
  {
   $sql="INSERT INTO department(department_name,department_alias) values('$deptname','$deptalias')";
   $query=$this->calldb()->query($sql);
    
  }
  else
  {
    echo "Some fields are empty";
  }
  
}
	}
}

$Department= new Department;
?>