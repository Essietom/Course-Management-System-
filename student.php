<?php

include 'header.php';

if($role!='student'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/studentclass.php';

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
           
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#personaldata" aria-controls="personaldata" role="tab" data-toggle="tab">View Personal Data</a></li>
              <li role="presentation"><a href="#view-coursesched" aria-controls="view-coursesched" role="tab" data-toggle="tab">View course schedule</a></li>
              <li role="presentation"><a href="#coursereg" aria-controls="coursereg" role="tab" data-toggle="tab">Register for a course</a></li>
              <li role="presentation"><a href="#view-regcourses" aria-controls="view-regcourses" role="tab" data-toggle="tab">View Registered Courses</a></li>
              <li role="presentation"><a href="#view-result" aria-controls="view-result" role="tab" data-toggle="tab">View result</a></li>
              <li role="presentation"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
             
            </ul>

            <div class="tab-content">

            <!-- Tab panes -->
            <?php require "studentinfo.php";?>
            <?php require "studentcoursereg.php";?>
            <?php require "studentviewresult.php";?>
            <?php require "studentviewregcourses.php";?>
            <?php require "studentinfocentre.php";?>


          </div>
          </div>
        </div>
        
      </div>
      <!-- /.col-lg-5 -->

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