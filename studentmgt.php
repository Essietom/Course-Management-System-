<?php

include 'header.php';

if($role!='admin'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/adminclass.php';

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

              <h3 class="box-title">Course Management</h3>
           
            </div>
          
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="student">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-student" aria-controls="add-student" role="tab" data-toggle="tab">Add student</a></li>
    <li role="presentation"><a href="#view-student" aria-controls="view-student" role="tab" data-toggle="tab">View student</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-student">
      
      <div class="add-student">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Student</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="POST" id="#form">
              <?php $Admin->addstudent();?>
                           <div class="box-body">
             <div class="form-group">
        <label class="col-md-2 control-label">Matric number</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text"  required name="matno" value="<?php echo !empty($matno)?$matno:'';?>" class="form-control" placeholder="Enter matric number">
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>

    <div class="form-group">
        <label class="col-md-2 control-label">First name:</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-usd"></i>
            </span>
            <input type="text"  required name="fn" value="<?php echo !empty($fn)?$fn:'';?>" class="form-control" placeholder="Enter first name">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Last name</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text"  required name="ln" value="<?php echo !empty($ln)?$ln:'';?>" class="form-control" placeholder="Enter last name">
          </div>
        </div>
     
        <div class="clearfix"> </div>
      </div>


      <div class="form-group">
        <label class="col-md-2 control-label">Password:</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-usd"></i>
            </span>
            <input type="password"  required name="pword" value="<?php echo !empty($pword)?$pword:'';?>" class="form-control" placeholder="Enter password">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">Date Of Birth</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input  type="date" name="dateofbirth"   required value="<?php echo !empty($dateofbirth)?$dateofbirth:'';?>" class="form-control" placeholder="mm/dd/yyyy">
          </div>
        </div>
       
        <div class="clearfix"> </div>
      </div>

       <div class="form-group">
        <label class="col-md-2 control-label">Phone number</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-earphone"></i>
            </span>
            <input type="text"  required name="phonenum" value="<?php echo !empty($phonenum)?$phonenum:'';?>" class="form-control" placeholder="Phone number">
          </div>
        </div>
     
        <div class="clearfix"> </div>
      </div>

       <div class="form-group">
        <label class="col-md-2">Email</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-envelope-o"></i>
            </span>
            <input type="email" name="email"  value="<?php echo !empty($email)?$email:''; ?>" required placeholder="Enter a valid email address" class="form-control">
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>


      <div class="form-group">
        <label class="col-md-2 control-label">Sex </label>
        <div class="col-md-8">
          <div class="input-group input-icon right in-grp1">
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <select name="sex" id="selector1" class="form-control"  required value="<?php echo !empty($sex)?$sex:'';?>">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    
                  </select>
          </div>
        </div>
      
        <div class="clearfix"> </div>
      </div>

     
      
<div class="form-group">
        <label class="col-md-2 control-label">Department</label>
        <div class="col-md-8">
          <div class="input-group in-grp1">             
            <span class="input-group-addon">
              <i class="fa fa-book"></i>
            </span>
            <select name='department' class="form-control" required value="<?php echo !empty($department)?$department:'';?>">

              <?php $Admin->selectoption(department,'department_name','department_id'); ?>

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
            <select name='level' class="form-control" required value="<?php echo !empty($level)?$level:'';?>">

              <?php $Admin->selectoption(level, 'level', 'level_id');?>

            </select>
          </div>
        </div>
        
        <div class="clearfix"> </div>
      </div>
     
     <input type="hidden" name="role" value="student">
    
      <div class="col-md-4"></div>
      <button type="submit" class="btn btn-primary col-md-4" name="add">Enrol</button>
      </div>
              <!-- /.box-footer -->
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-student">
      <div class="view-student">

   <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid bg-white-gradient">

          <div class="box-header with-border">
            <h3 class="box-title">View Student</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">


          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Last Name</th>
                <th>Other Names</th>
                <th>Sex</th>
                <th>D.O.B</th>
                <th>Matric number</th>
                <th>Department</th>
                <th>Phone no</th>
                
                <th>Email</th>
                <th>Level</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>


            <?php $Admin->deletestudent(); ?>

            <?php $Admin->viewstudent(); ?>
            
            <?php $Admin->updatestudent(); ?>
            
            
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