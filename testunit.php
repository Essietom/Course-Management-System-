<?php
require "functions/functions.php";
class Test extends coursemgt
{
public function addstudent()
	{
				$matno	='20132397';
				$sql="SELECT student_matric_no FROM student";
				$query=$this->calldb()->query($sql);
				foreach ($query as $data) {
					$existing=$data['student_matric_no'];
				}
					if($existing==$matno)
					{
						echo "A student with this matric number already exist";
					}

					else
					{
							echo "You are unique";

				     }

			
	}


}

$tes=new Test;
echo $tes->addstudent();

?>