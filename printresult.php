
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

<a href="javascript:Clickheretoprint()"><i class="fa fa-print"> Print</i></a>

<div id="content">

	<div class="result-header">
		
		<h3 style="text-align: center; color:brown;">Provisional statement of Result</h3><hr>
	</div>
	<div>

	<?php  

	foreach($this->getstudentpersonaldata() as $data)
	{
		$stdname = $data['fullname'];
		$stdmatno = $data['student_matric_no'];
		$stddept = $data['department_name'];
		$stdlevel = $data['level'];
	}


	$sql="SELECT session from session where session_id=$sessionid";
	$query=$this->calldb()->query($sql);
	foreach ($query as $data) {
		
		$session=$data['session'];
	}

	if($semesterid==1)
	{
		$semester="first semester";
	}
	else
	{
		$semester="second semester";
	}
	?>
	<table>
	<tr> <td width="50%"> Name: <br> </td>  <td> <?php echo $stdname;?><br></td></tr>
	<tr><td width="50%">	Matric Number: <br></td> <td>    <?php echo $stdmatno;?><br></td><tr>
	<tr><td width="50%">	Programme: <br></td>   <td> <?php echo $stddept;?><br></td> </tr>
	<tr><td width="50%">	 Level:<br> </td> <td>  <?php echo $stdlevel;?><br></td></tr>
	<tr><td width="50%">	Session(Semester):<br></td><td><?php echo  "$session ($semester)" ?><br></td></tr>

		</table>

	</div>
	 <table class="table span12 table-stripped" width="100%">
   
    <thead>

      <tr>
        
        <th>Course Code</th>
        <th>Course title</th>
        <th>Course Unit</th>
        <th>Score</th>
        
        <th>Grade</th>

      </tr>
    </thead>

    <tbody>
<?php

foreach ($this->getresultdetail($semesterid,$sessionid,$studentid) as $data):
?>
				<tr>

					<td align="center"><?php echo $data['course_code']?></td>
					<td align="center"><?php echo $data['course_name']?></td>
					<td align="center"><?php echo $data['course_unit']?></td>
					<td align="center"><?php echo $data['total']?></td>
					<td align="center"><?php echo $data['grade']?></td>

				</tr>
				<br>

<?php endforeach;?>
		  </tbody><br><br>

  </table>


		

			<table class="table span12 table-stripped" width="100%">
			<h3><b>Outstanding Courses</b></h3>
			<thead>
				<tr>
        
        <th>Course Code</th>
        <th>Course title</th>
        <th>Course Unit</th>
        <th>Score</th>
        
        <th>Grade</th>

      </tr>
			</thead>
			<?php

				foreach ($this->getoutstandingcourses($semesterid,$sessionid,$studentid) as $data):
				
			?>
				<tr>

					<td align="center"><?php echo $data['course_code']?></td>
					<td align="center"><?php echo $data['course_name']?></td>
					<td align="center"><?php echo $data['course_unit']?></td>
					<td align="center"><?php echo $data['total']?></td>
					<td align="center"><?php echo $data['grade']?></td>

				</tr>


			<?php endforeach;?>
			</table>

			<br><br><br>
			
			

	<div class="row">

		<div class="col-md-6">

		<?php $gpa = $this->calculateGPA($studentid,$semesterid,$sessionid)?>

			<table width="50%" align="left">
			<h3 >Grade</h3>
	<tr> <td width="50%"> TCP: <br> </td>  <td> <?php echo $this->calculateTCP($studentid,$semesterid,$sessionid)?><br></td></tr>
	<tr><td width="50%">	TNU: <br></td> <td>   <?php echo $this->calculateTNU($studentid,$semesterid,$sessionid)?><br></td><tr>
	<tr><td width="50%">	GPA: <br></td>   <td><?php echo $this->calculateGPA($studentid,$semesterid,$sessionid)?><br></td> </tr>
	<tr><td width="50%">	 REMARK:<br> </td> <td><?php echo $this->GPAstatus($gpa)?><br></td></tr>
	

		</table>
			<br><br><br><br><br>
		</div>

		<div class="col-md-6">
			<table width="50%" align="right">
				<thead>
					<h3 style="text-align:center;" align="left">Grading System</h3>
					<th width="25%">Mark(%)</th>
					<th width="25%">Grade Point</th>
					<th width="25%">Grade letter</th>
					<th width="25%">Level of Achievement</th>

				</thead>
				<tbody>
					<tr>
					<td align="center">75-100</td>
					<td align="center">5</td>
					<td align="center">A</td>
					<td align="center">Excellent</td>
					</tr>

					<tr>
					<td align="center">65-75</td>
					<td align="center">4</td>
					<td align="center">B</td>
					<td align="center">Very good</td>
					</tr>

					<tr>
					<td align="center">55-65</td>
					<td align="center">3</td>
					<td align="center">C</td>
					<td align="center">Good</td>
					</tr>

					<tr>
					<td align="center">50-55</td>
					<td align="center">2</td>
					<td align="center">D</td>
					<td align="center">Fairly good</td>
					</tr>

					<tr>
					<td align="center">45-50</td>
					<td align="center">1</td>
					<td align="center">E</td>
					<td align="center">Poor</td>
					</tr>

					<tr>
					<td align="center"><45</td>
					<td align="center">0</td>
					<td align="center">F</td>
					<td align="center">Fail</td>
					</tr>
				</tbody>
			</table><br><br>
		</div>
	
	</div>
<br><br><br>

	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	____________________________________<br>
	<p>HOD'S Signature</p>
	</div>

	</div>

</div>
