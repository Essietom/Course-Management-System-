<?php

include 'header.php';

if($role!='instructor'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/instructorclass.php';


$id=$_SESSION['SESS_USER_ID'];

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Course Mgt System
     <small>Course Management</small>
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
   <div class="col-lg-12">
    <div class="box box-solid bg-white-gradient">
      <div class="box-header">


        <h3 class="box-title">Course Management</h3>

      </div>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="course">

          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#personaldata" aria-controls="personaldata" role="tab" data-toggle="tab">View Personal Data</a></li>
            <li role="presentation"><a href="#coursesched" aria-controls="coursesched" role="tab" data-toggle="tab">Schedule course</a></li>
            <li role="presentation"><a href="#view-coursesched" aria-controls="view-coursesched" role="tab" data-toggle="tab">View course schedule</a></li>
            <li role="presentation"><a href="#uploadassignment" aria-controls="uploadassignment" role="tab" data-toggle="tab">Uploads</a></li>
            <li role="presentation"><a href="#assignmentsubmission" aria-controls="assignmentsubmission" role="tab" data-toggle="tab">Download submissions</a></li>
            <li role="presentation"><a href="#enterstudentresult" aria-controls="enterstudentresult" role="tab" data-toggle="tab">Enter Scores for Student</a></li>
            <li role="presentation"><a href="#instructor-info" aria-controls="instructor-info" role="tab" data-toggle="tab">Information</a></li>
           
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <?php require "instructordata.php";?>
            <?php require "instructorcoursesched.php";?>
            <?php require "instructorassignment.php";?>
            <?php require "instructorlecturenote.php";?>
            <?php require "downloadsubmission.php";?>
            <?php require "instructorresult.php";?>
            <?php require "instructorinfocentre.php";?>





          </div>


        </div>
      </div>

    </div>
  </div>

</div>
</section>

</div>

<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function() { Pace.restart(); });
  $('.ajax').click(function(){
    $.ajax({url: '#', success: function(result){
      $('.ajax-content').html('<hr>Ajax Request Completed !');
    }});
  });
</script>

<?php include "footer.php"; ?>