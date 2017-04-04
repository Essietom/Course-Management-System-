<?php
require "functions/functions.php";
class Result extends coursemgt
{


public function setgrade($total)
{
	if($total>=75)
	{
		
		$gradepoint=5;
	}
	elseif($total>=65&&$total<75)
	{
	
		$gradepoint=4;
	}
	elseif($total>=55&&$total<65)
	{
		
		$gradepoint=3;
	}
	elseif($total>=50&&$total<55)
	{
		
		$gradepoint=2;
	}
	elseif($total>=45&&$total<50)
	{
	
		$gradepoint=1;
	}
	else
	{
		
		$gradepoint=0;
	}

	return $gradepoint;
}


public function setgradeletter($total)
{
	if($total>=75)
	{
		$grade='A';
	
	}
	elseif($total>=65&&$total<75)
	{
		$grade='B';
		
	}
	elseif($total>=55&&$total<65)
	{
		$grade='C';
		
	}
	elseif($total>=50&&$total<55)
	{
		$grade='D';
		
	}
	elseif($total>=45&&$total<50)
	{
		$grade='E';
		
	}
	else
	{
		$grade='F';
		
	}

	return $grade;
}
public function calculateTNU($student,$semester,$session)
{
	$sql="SELECT *, sum(course_unit) as TNU from courses,courseregistration where courseregistration.student_id=$student AND courses.course_id=courseregistration.course_id AND semester=$semester AND session=$session";
	$query=$this->calldb()->query($sql);

	foreach ($query as $data) {
		$TNU=$data['TNU'];
	}

	return $TNU;
}


public function calculateTCP($student,$semester,$session)
{
	$TCP=0;
	$sql="SELECT * from score,courses,courseregistration where courses.course_id=courseregistration.course_id AND score.student_id=$student AND courseregistration.student_id=$student AND score.semester=$semester AND score.session=$session and courses.course_id=score.course_id";
	$query=$this->calldb()->query($sql);

	foreach ($query as $data) {
		$coursetotal=$data['total'];
		$courseunit=$data['course_unit'];
		$coursegrade=$this->setgrade($coursetotal);

		$CP=$courseunit * $coursegrade;
		$TCP+=$CP;
	}

	return $TCP;
}

public function calculateGPA($student,$semester,$session)
{
	$tcp=$this->calculateTCP($student,$semester,$session);
	$tnu=$this->calculateTNU($student,$semester,$session);

	if($tnu<1)
	{
		$GPA='';
	}
	else
	{
		$GPA=$tcp/$tnu;
	}

	

	return $GPA;
}

public function remark($student)
{
	$sql="SELECT * FROM  score where student_id=$student and total<35";
	$query=$this->query($sql);
	$count=$query->rowCount();

	if($count<1)
	{
		$remark="Pass";
	}

	else
	{
		foreach ($query as $data) {

			$remark=array($data['course_id']);
		}
	}


}

public function GPAstatus($GPA)
{
	
	{
		if($GPA>=4.5)
		{
			$status="FIRST CLASS";
		}

		elseif($GPA>=3.5 && $GPA<4.5)
		{
			$status="SECOND CLASS UPPER";
		}

		elseif($GPA>=3.0 && $GPA<3.5)
		{
			$status="SECOND CLASS LOWER";
		}

		elseif($GPA>=2.0 && $GPA<3.0)
		{
			$status="THIRD CLASS";
		}

		elseif($GPA>=1.0 &&  $GPA<2.0)
		{
			$status="PASS";
		}

		else
		{
			$status="WITHDRAWAL P";
		}

		return $status;
	}
}


//NOW I NEED THE FOLLOWING::::instructor enters score, student view result(score for each course and GPA), instructor view his students' score(assignment,test and exam)


public function statistics($course)
{
	$sql="SELECT * FROM score where $course_id=$course";
	$query=$this->query($sql);
	$count=$query->rowCount(); 

	//complete this function ooooo
}


}
$Result= new Result;


?>
