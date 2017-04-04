<?php

include 'header.php';

if($role!='admin'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/courseclass.php';

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

        <!-- The Section and Two Divs show Start of Page Contenct -->
    <!-- Calendar -->
    <div class="col-lg-12">
          <div class="box box-solid bg-white-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">course Management</h3>
           
            </div>
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="course">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-course" aria-controls="add-course" role="tab" data-toggle="tab">Add course</a></li>
    <li role="presentation"><a href="#view-course" aria-controls="view-course" role="tab" data-toggle="tab">View course</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-course">
      
      <div class="add-course">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Course management</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="courses.php" method="POST" id="#form">
              <?php $Course->addCourse()?>
                           <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">course code:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter course code" name="coursecode" class="form-control" value="<?php echo !empty($coursecode)?$coursecode:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">course title:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter course title" name="coursetitle" class="form-control" value="<?php echo !empty($coursetitle)?$coursetitle:'';?>">
                  </div>
                          
        <div class="clearfix"> </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">course unit:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter course unit" name="courseunit" class="form-control" value="<?php echo !empty($courseunit)?$courseunit:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>

                <div class="form-group">
        <label class="col-md-2 control-label">Host Department</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-book"></i>
            </span>
            <select name='deptid' class="form-control" required value="<?php echo !empty($deptid)?$deptid:'';?>">

              <?php $Course->selectoption(department,'department_name','department_id'); ?>

            </select>
          </div>
        </div>
        
        <div class="clearfix"> </div>
      </div>

      
     
     
       <div class="form-group">
        <label class="col-md-2 control-label">Level</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-book"></i>
            </span>
            <select name='levelid' class="form-control" required value="<?php echo !empty($levelid)?$levelid:'';?>">

              <?php $Course->selectoption(level, 'level', 'level_id');?>

            </select>
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>

       
       <div class="form-group">
        <label class="col-md-2 control-label">Semester</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-book"></i>
            </span>
            <select name='semesterid' class="form-control" required value="<?php echo !empty($semesterid)?$semesterid:'';?>">

             <option value="1">first semester</option>
              <option value="2">second semester</option>

            </select>
          </div>
        </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer"><button type="submit" class="btn btn-primary" name="add">Add course</button></div>
              <!-- /.box-footer -->
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-course">
      <div class="view-course">

         <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
            <div class="box-header" >
              <h2 class="box-title">View course</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Course code</th>
                  <th>Course title</th>
                  <th>Course unit</th>
                  <th>Action</th>
             
                   <?php 
                  $Course->viewCourse();
                  $Course->deleteCourse();
              ?>
              

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

                
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