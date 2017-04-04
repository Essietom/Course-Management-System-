<?php
require "classes/resultclass.php";

class Student extends Result
{


	public $studentid;
	
	public function __construct()
	{
		
		foreach ($this->getstudentpersonaldata() as $data) {
			$this->studentid = $data['student_id'];
		
		}
		
	}


	public  function getstudentpersonaldata()
	{
		$id=$_SESSION['SESS_USER_ID'];
		
		if(null==$id)
		{
			header('Location:student.php');
		}
		else
		{
			$sql="SELECT *, concat(student_firstname,' ',student_lastname) as fullname 
			FROM student,department,level,user 
			WHERE user.user_id=$id 
			AND user.username=student.student_matric_no 
		 
			AND department.department_id=student.student_dept_id 
			AND level.level_id=student.student_level";

			$query=$this->calldb()->prepare($sql);

			$query->execute();
			
			return $query;
		}
	}


	public  function displaystudentpersonaldata()
	{
		foreach ($this->getstudentpersonaldata() as $data):
			?>

		<div class="row container">
			<div class="row">
				<div class="col-md-3">Name:</div>
				<div class="col-md-9"><?php echo $data['student_firstname'].' '.$data['student_lastname'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Birthday:</div>
				<div class="col-md-9"><?php echo $data['student_dob'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Phone number:</div>
				<div class="col-md-9"><?php echo $data['student_phonenum'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Matric number:</div>
				<div class="col-md-9"><?php echo $data['student_matric_no'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Email:</div>
				<div class="col-md-9"><?php echo $data['student_email'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Sex:</div>
				<div class="col-md-9"><?php echo $data['student_sex'];?></div>
			</div><br>

			<div class="row">
				<div class="col-md-3">Department:</div>
				<div class="col-md-9"><?php echo $data['department_name'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-3">Level:</div>
				<div class="col-md-9"><?php echo $data['level'];?></div>
			</div><br>

		</div>
		<?php
		endforeach;
	}



	public  function viewcourseschedule()
	{
		$studentid=$this->studentid;
		$sql="SELECT  *
		from courseschedule,courses,venue,instructor,courseregistration 
		where courseregistration.student_id=$studentid
		and  courseschedule.course_id=courseregistration.course_id
		and courseregistration.course_id=courses.course_id 
		and venue.venue_id=courseschedule.venue 
		and instructor.instructor_id=courseschedule.instructor_id
		and coursedate > date(now());
		";

		$query=$this->calldb()->query($sql);

		foreach ($query as $data): 

			?>
		<tr>
			<th><?php echo $data['course_code']?></th>
			<th><?php echo $data['course_name']?></th>
			<th><?php echo $data['instructor_firstname']." ".$data['instructor_lastname']; ?></th>
			<th><?php echo $data['venue']?></th>
			<th><?php echo $data['coursetime']?></th>
			<th><?php echo $data['coursedate']?></th>
		</tr>

		<?php 
		endforeach;
	}









	public  function courseregistration()
	{
		
		if(isset($_REQUEST['generatecourses']))
		{


			$deptid=$_REQUEST['deptid'];
			$levelid=$_REQUEST['levelid'];
			$semesterid=$_REQUEST['semesterid'];
			$session=$_REQUEST['session'];
			$studentid=$this->studentid;




			?>
			<form action='' method='post'>
				<?php
				$sql="SELECT * 
				FROM courses 
				where level_id=? 
				AND department_id=? AND semester_id=?";
				$query=$this->calldb()->prepare($sql);
				$query->execute(array($levelid,$deptid,$semesterid));
				foreach ($query as $data):
					?>
				<tr>

					<td><input type='checkbox' name='courses[]' value="<?php echo $data['course_id']?>"></td>
					<td><?php echo $data['course_code']?></td>
					<td><?php echo $data['course_name']?></td>
					<td><?php echo $data['course_unit']?></td>
					<td><?php echo $data['course_status']?></td>

				</tr>

				<?php endforeach;?>

				<input type="hidden" name="stdid" value="<?php echo $studentid;?>">
				<input type="hidden" name="semester" value="<?php echo $semesterid;?>">
				<input type="hidden" name="session" value="<?php echo $session;?>">

				<button type="submit" class="btn btn-primary" name="registercourses">Register</button>      

			</form>
			<?php
			
		}//endif
	}


	public  function submitregisteredcourses()
	{
		if(isset($_REQUEST['registercourses']))
		{
			$studentid=$_POST['stdid'];
			$semester=$_POST['semester'];
			$session=$_POST['session'];
			if(!empty($_POST['courses']))
			{

				foreach ($_POST['courses'] as $selected) {

					$sql1="SELECT * from courseregistration where student_id=$studentid and course_id=$selected and semester=$semester and session=$session";
					$query1=$this->calldb()->query($sql1);
					if($query1->rowCount()>0)
					{
						
					}

					else
					{

						$sql="INSERT INTO courseregistration (student_id,course_id,session,semester)  VALUES(?,?,?,?) ";
						$query=$this->calldb()->prepare($sql);

						$query->execute(array(
							$studentid,
							$selected,
							$session,
							$semester
							));

						$sql2="INSERT into score (student_id, course_id, test_score,assignment_score, exam_score, total,semester,session) values ($studentid,$selected,0,0,0,0,$semester,$session)";
						$query=$this->calldb()->query($sql2);
				    }

				}

				
			}

		}

	}


	public  function viewregisteredcourses()
	{
		$studentid=$this->studentid;
		$sql="SELECT * 
		FROM courseregistration,courses 
		WHERE courseregistration.student_id=? and courses.course_id=courseregistration.course_id";
		$query=$this->calldb()->prepare($sql);
		$query->execute(array($studentid));
		$sn=1;
		foreach ($query as $data)
		{
			echo "<tr>" ;

			echo "<td>".$sn."</td>";
			echo "<td>".$data['course_code']."</td>";

			echo "<td>".$data['course_name']."</td>";
			echo "<td>".$data['course_unit']."</td>";
			echo "<td>".$data['course_status']."</td>";

			echo "</tr>"; 
			$sn+=1;
		}


	}





	public  function downloadassignment()
	{
	
		$studentid=$this->studentid;
		$sql="SELECT * FROM assignment,courses,courseregistration 
		where assignment.course_id=courses.course_id 
		and courseregistration.course_id=assignment.course_id
		and courseregistration.student_id=? 
		and assignment.towho=2";
		$query=$this->calldb()->prepare($sql);
		$query->execute(array($studentid));
		foreach ($query as $data):


			$filename=$data['assignment'];
		?>
		<tr>
			<td><?php echo $data['course_code']?></td>
			<td><?php echo $data['course_name']?></td>
			<td><?php echo $data['deadline']?></td>
			<td>
				<form action='download.php' method='post'>
					<input type='hidden' name='file' value="<?php echo 'document/'.$filename;?>">
					<button type='submit'>Download</button>

				</form>
			</td>

		</tr>

	<?php endforeach;
}



public  function uploadsubmission()
{
	$studentid=$this->studentid;
	

	if(isset($_REQUEST['uploadsubmission']))
	{


		$course=$_REQUEST['course'];
		$sql="SELECT instructor_id from instructor where course_id=?";
		$query=$this->calldb()->prepare($sql);
		$query->execute(array($course));
		$data=$query->fetch(PDO::FETCH_ASSOC);
		$id=$data['instructor_id'];

		?>
		<form role="form"  action="studentupload.php" method="post" enctype="multipart/form-data">

			<div class="box-body">



				<div class="form-group">


					<input type="hidden" name="student_id" value="<?php echo $studentid;?>">
					<input type="hidden" name="instructor_id" value="<?php echo $id;?>">
					<input type="hidden" name="course_id" value="<?php echo $course;?>">
					<input type="hidden" name="towho" value="1"><?php // 1 implies that the assignment is from student to instructor?>
					<input type="hidden" name="max_file_size" value="300000">
					<input type="file" name="file" id="file" required="" />
					<p class="help-block">pdf,txt,word format</p>

				</div>

			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary" name="doc">Upload</button>
			</div>
		</form>
		<?php } //endif;

	}


	public function getinformation()
	{
		$studentid=$this->studentid;
		$sql="SELECT * from information,courseregistration where courseregistration.student_id=$studentid and information.course_id=courseregistration.course_id";
		$query=$this->calldb()->query($sql);
		foreach ($query as $data) {
			?>
			<div>
				<h3><?php echo $data['info_title']?></h3>
				<p><?php echo $data['post_date']?>	</p>
				<p><?php echo $data['info']?></p>
			</div>
			<?php
		}
	}



	public function getresultdetail($semesterid,$sessionid,$studentid)
	{
		

				$sql="SELECT *
				FROM score,courses
				where score.semester=?
				AND score.session=?
				AND score.student_id=? 
				AND score.course_id=courses.course_id ";
				$query=$this->calldb()->prepare($sql);
				$query->execute(array($semesterid,$sessionid,$studentid));

				return $query;
				
		
	
	}

	public function getoutstandingcourses($semesterid,$sessionid,$studentid)
	{
		
				$sql2="SELECT *
				FROM score,courses
				where score.semester=?
				AND score.session=?
				AND score.student_id=? 
				AND score.course_id=courses.course_id 
				AND total < 40";

				$query=$this->calldb()->prepare($sql2);
				$query->execute(array($semesterid,$sessionid,$studentid));

				return $query;
				
		
	
	}



	public function viewresult()
	{
		if(isset($_REQUEST['viewresult']))
		{


			$semesterid=$_REQUEST['semesterid'];
			$sessionid=$_REQUEST['sessionid'];
			$studentid=$this->studentid;


			require "printresult.php";
		}	
		
				
		
	}

	
}





$Student= new Student;

?>