<?php
require "classes/resultclass.php";

class Instructor extends Result
{


	public $instructorid;
	public $course;
	
	public function __construct()
	{
		
		foreach ($this->getinstructorpersonaldata() as $data) {
			$this->instructorid = $data['instructor_id'];
			$this->course=$data['course_id'];
		}
		
	}


	public  function getinstructorpersonaldata()
	{
		$id=$_SESSION['SESS_USER_ID'];
		

		if(null==$id)
		{
			header('Location:instructor.php');
		}
		else
		{
			$sql="SELECT * 
			FROM user,instructor,department 
			WHERE user.user_id=$id 
			AND department.department_id=instructor.department_id
			AND user.username=instructor.instructor_regno 
			";

			$query=$this->calldb()->prepare($sql);

			$query->execute();

			return $query;
		}
	}


	public  function displayinstructorpersonaldata()
	{
		foreach ($this->getinstructorpersonaldata() as $data):
			?>

		<div class="row container">
			<div class="row">
				<div class="col-md-4">Name:</div>
				<div class="col-md-8"><?php echo $data['instructor_firstname'].' '.$data['instructor_lastname'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Instructor's staff number:</div>
				<div class="col-md-8"><?php echo $data['instructor_regno'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Birthday:</div>
				<div class="col-md-8"><?php echo $data['instructor_dob'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Phone number:</div>
				<div class="col-md-8"><?php echo $data['instructor_phonenum'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Department:</div>
				<div class="col-md-8"><?php echo $data['department_name'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Email:</div>
				<div class="col-md-8"><?php echo $data['instructor_email'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Sex:</div>
				<div class="col-md-8"><?php echo $data['instructor_sex'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Year of appointment:</div>
				<div class="col-md-8"><?php echo $data['instructor_yr_appointed'];?></div>
			</div><br>
			<div class="row">
				<div class="col-md-4">Qualification:</div>
				<div class="col-md-8"><?php echo $data['instructor_qualification'];?></div>
			</div><br>

		</div>
		<?php
		endforeach;
	}



	public  function viewcourseschedule()
	{
		$instructorid=$this->instructorid ;
		$course=$this->course ;
		$sql="SELECT * from courseschedule,courses,venue
		where courseschedule.instructor_id=$instructorid 
		and courses.course_id=$course 
		and venue.venue_id=courseschedule.venue
		and coursedate>=now()
		";

		$query=$this->calldb()->query($sql);

		foreach ($query as $data): 

			?>
		<tr>
			<th><?php echo $data['course_code']?></th>
			<th><?php echo $data['course_name']?></th>

			<th><?php echo $data['venue']?></th>
			<th><?php echo $data['coursetime']?></th>
			<th><?php echo $data['coursedate']?></th>
		</tr>

		<?php 
		endforeach;
	}








	public  function downloadsubmission()
	{
		$instructorid=$this->instructorid ;
		$course=$this->course ;
		$sql="SELECT * FROM assignment,courses where assignment.instructor_id=$instructorid and courses.course_id=$course and  assignment.towho=1";
		$query=$this->calldb()->query($sql);

		foreach ($query as $data)
		{

			$filename=$data['assignment'];
			?>

			<tr>
				<td><?php echo $data['course_code']?></td>
				<td><?php echo $data['course_name']?></td>
				<td><?php echo $data['datesubmitted']?></td>
				<td>
					<form action='download.php' method='post'>
						<input type='hidden' name='file' value="<?php echo 'document/'.$filename;?>">
						<button type='submit'>Download</button>

					</form>
				</td>

			</tr>

			<?php }
		}



		public  function uploadassignment()
		{

			$instructorid=$this->instructorid ;
		$course=$this->course ;
	
				?>
				<form role="form"  action="instructorupload.php" method="post" enctype="multipart/form-data">

				 	<div class="box-body">


						<div class="form-group">
							<label >Upload assignment</label>
							<input type="hidden" name="instructor_id" value="<?php echo $instructorid;?>">
							<input type="hidden" name="course_id" value="<?php echo $course;?>">
							<input type="hidden" name="student_id" value="0">
							<input type="hidden" name="towho" value="2"><?php // 2 implies that the assignment is from instructor to student?>
							<input type="hidden" name="max_file_size" value="300000">
							<input type="file" name="file" id="file" required="" />
							<p class="help-block">pdf,txt,word format</p>
							<label>Deadline:</label>
							<input type="text" name="deadline" placeholder="yyyy-mm-dd">

						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
					
						<button type="submit" class="btn btn-primary" name="doc">Upload</button>
					</div>
				</form>
		<?php

	}



public  function uploadlecturenote()
{
	$courseid=$this->course;
	

	if(isset($_REQUEST['uploadnote']))
	{


		$department=$_REQUEST['deptid'];
		

		?>
		<form role="form"  action="uploadnote.php" method="post" enctype="multipart/form-data">

			<div class="box-body">



				<div class="form-group">


					<input type="hidden" name="department_id" value="<?php echo $department;?>">
					<input type="hidden" name="course_id" value="<?php echo $courseid;?>">
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




	public function schedulecourse()
	{
		$instructorid=$this->instructorid ;
		$course=$this->course ;
		?>
		 <form role="form" class="form-inline" action="" method="POST">
                       <div class="box-body">

                         <input type="hidden" name="instructor_id" value="<?php echo $instructorid;?>">

                         <div class="form-group">
                          <label>Course</label>

                          <select name='courseid' class="form-control" required value="<?php echo !empty($courseid)?$courseid:'';?>">

                            <?php $this->selectoption(courses, 'course_name', 'course_id');?>

                          </select>

                        </div>
                        <div class="form-group">
                          <label>Date:</label>
                          <input type="date" name="date">
                        </div>

                        <div class="form-group">
                          <label>Time</label>
                          <input type="time" name="time">
                        </div>

                        <div class="form-group">

                          <label>Venue</label>
                          <select name="venue" required value="<?php echo !empty($venue)?$venue:'';?>">

                          	<?php
                          	$sql="SELECT * FROM venue";
                          	$rquery=$this->calldb()->query($sql);

                          	foreach ($rquery as $data) 
                          	{
                          		echo'<option value="'.$data['venue_id'].'">'.$data['venue'].' ('.$data['capacity'].')'.'</option>';
                          	}
                          	?>
                           
                          </select>
                        </div>


                        <button id="submit" class="btn btn-primary btn-sm" type="submit" name="schedule">Schedule</button>
                      </div>
                      <!-- /.box-body -->




                    </form>
		<?php
	}



	public function schedulecourseprocess()
	{
		if(isset($_REQUEST['schedule']))
		{
			$courseid=$_POST['courseid'];
			$instructor_id=$_POST['instructor_id'];
			$coursetime=$_POST['time'];
			$coursedate=$_POST['date'];
			$venue=$_POST['venue'];


			$sql="INSERT INTO courseschedule (course_id,instructor_id,coursetime,coursedate,venue)  VALUES(?,?,?,?,?)";
			$query=$this->calldb()->prepare($sql);

			$query->execute(array(
				$courseid,
				$instructor_id,
				$coursetime,
				$coursedate,
				$venue
				));


			header("Location:instructor.php");

		}

	}


	public function postinformation()
	{
		if(isset($_REQUEST['news']))
		{
			$info=$_POST['info'];
			$infotitle=$_POST['infotitle'];
			$courseid=$this->course;

			$sql="INSERT INTO `information`(`info`, `post_date`, `course_id`,`info_title`) VALUES ('$info',now(),$courseid, '$infotitle')";
			$query=$this->calldb()->query($sql);
		}
	}



	public function addscore()
	{
		$instructorid=$this->instructorid ;
		$course=$this->course ;
	

		if(isset($_REQUEST['getresultform']))
		{
			$resulttype=$_REQUEST['resulttype'];
			echo "<h3>".$resulttype."</h3>";
		
		$sql = "SELECT  concat(student_firstname,' ',student_lastname) as fullname,student.student_id as id  FROM student,courseregistration where courseregistration.student_id=student.student_id and courseregistration.course_id=$course";
		$query=$this->calldb()->query($sql);

		$sn=1;
		foreach ($query as $data) {
			?>
			<form method="POST" action="">
			<tr>
			<td><?php echo $sn ?></td>
			<td><?php echo $data['fullname'] ?></td>

			<td><input type="number" name="score[]" placeholder="Score"></td>
			</tr>
			<input type="hidden" name="studentid[]" value="<?php echo $data['id'];?>">
			<input type="hidden" name="resulttype" value="<?php echo $resulttype;?>">

			<?php
			$sn++;


		}
		$numberofstudents=$sn;
		?>
		<input type="hidden" name="numofstudent" value="<?php echo $numberofstudents?>">
		<input type="hidden" name="course" value="<?php echo $course?>">
		<button type="submit" name="enterscore">Enter</button>
	</form>
	<?php
 }

 }


public function processscore()
{
	if(isset($_POST['enterscore']))
	{
		$resulttype=$_POST['resulttype'];
		$noofstud=$_POST['numofstudent'];
		$studentid=$_POST['studentid'];
		$courseid=$_POST['course'];
		$score =$_POST['score'];


		if($resulttype=="Test")
		{
			for ($i=0; $i < $noofstud -1 ; $i++) { 

				$sql="UPDATE  score SET test_score=test_score+$score[$i], total=exam_score+assignment_score+test_score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql);

				$sql2="SELECT * from score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql2);

				foreach ($query as $data) {

					$total=$data['total'];
					$gradeletter=$this->setgradeletter($total);
					$sql3="UPDATE score set grade='$gradeletter' where student_id=$studentid[$i] and course_id=$courseid";
					$query=$this->calldb()->query($sql3);
				}
				
			}


		}

		elseif($resulttype=="Assignment")
		{
			for ($i=0; $i < $noofstud -1 ; $i++) { 

				$sql="UPDATE  score SET assignment_score=assignment_score+$score[$i], total=exam_score+assignment_score+test_score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql);

				$sql2="SELECT * from score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql2);

				foreach ($query as $data) {

					$total=$data['total'];
					$gradeletter=$this->setgradeletter($total);
					$sql3="UPDATE score set grade='$gradeletter' where student_id=$studentid[$i] and course_id=$courseid";
					$query=$this->calldb()->query($sql3);
				}

			}


		}

		else
		{
			for ($i=0; $i < $noofstud -1 ; $i++) { 

				$sql="UPDATE  score SET exam_score=exam_score+$score[$i], total=exam_score+assignment_score+test_score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql);

				$sql2="SELECT * from score where student_id=$studentid[$i] and course_id=$courseid";
				$query=$this->calldb()->query($sql2);

				foreach ($query as $data) {

					$total=$data['total'];
					$gradeletter=$this->setgradeletter($total);
					$sql3="UPDATE score set grade='$gradeletter' where student_id=$studentid[$i] and course_id=$courseid";
					$query=$this->calldb()->query($sql3);
				}
			}
		}
	}
}



public function viewresult()
{
	$course=$this->course;
	$sql="SELECT *, concat(student_firstname,' ',student_lastname) as fullname from student , score where score.course_id=$course and student.student_id=score.student_id";
	$query=$this->calldb()->query($sql);
	foreach ($query as $data) {
		
		?>
		<tr>
			<td><?php echo $data['fullname']?></td>
			<td><?php echo $data['assignment_score']?></td>
			<td><?php echo $data['test_score']?></td>
			<td><?php echo $data['exam_score']?></td>
			<td><?php echo $data['total']?></td>
			<td><?php echo $data['grade']?></td>
		<td><button class='btn btn-info' data-toggle='modal' data-target="#myModal<?php echo $data['score_id']?>"><i class='fa fa-edit'></i></button></td>

    </tr>
      

      <div id="myModal<?php echo $data['score_id']; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <form class="form-horizontal" action="" method="POST" role="form">
                <div class="well">

                                  <label><?php echo $data['fullname']?></label><br><br>
                 
                 <label class="control-label">Assignment score</label>
                 <input type="text" required name="assignment" class="form-control" placeholder="Assignment" value="<?php echo $data['assignment_score'];?>"><br>

                 <label class="control-label">Test Score</label>
                <input type="text" required name="test" class="form-control" placeholder="Test" value="<?php echo $data['test_score'];?>"><br>

                 <label class="control-label">Exam Score</label>
                 <input type="text" required name="exam" class="form-control" placeholder="Exam" value="<?php echo $data['exam_score'];?>"><br>

                 <input type="hidden" required value="<?php echo $data['score_id']?>" name="id" class="form-control">
                 <button type="submit" class="btn btn-info" data-target="#myModal" name="updatescore" data-toggle="modal">update</button> 

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

public function updatestudentscore()
{

  if(isset($_POST['updatescore']))
  {
    		
			$assignment=$_POST['assignment'];
			$test=$_POST['test'];
			
			$exam=$_POST['exam'];
			$total=$assignment+$test+$exam;

			
		
    $id=$_POST['id'];


    $sql="UPDATE score SET assignment_score='$assignment', test_score='$test', exam_score='$exam', total='$total' WHERE score_id=$id";
    $query=$this->calldb()->query($sql);
    $query->execute();

    $sql2="SELECT * from score  WHERE score_id=$id";
				$query=$this->calldb()->query($sql2);

				foreach ($query as $data) {

					$total=$data['total'];
					$gradeletter=$this->setgradeletter($total);
					$sql3="UPDATE score set grade='$gradeletter'  WHERE score_id=$id";
					$query=$this->calldb()->query($sql3);
				}
    echo "<meta http-equiv='refresh' content='0; url=instructor.php'/>";

  }
}

}

$Instructor= new Instructor;

?>