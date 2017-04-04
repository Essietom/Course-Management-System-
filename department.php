<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBrhZGvQO-PkSoApVtrN5YxJs70_JplKXM",
    authDomain: "crystaltom-e53f2.firebaseapp.com",
    databaseURL: "https://crystaltom-e53f2.firebaseio.com",
    storageBucket: "crystaltom-e53f2.appspot.com",
    messagingSenderId: "48386727521"
  };
  firebase.initializeApp(config);
</script>
  
<?php

include 'header.php';

if($role!='admin'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/departmentclass.php';

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
    <div role="tabpanel" class="tab-pane active" id="department">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-department" aria-controls="add-department" role="tab" data-toggle="tab">Add Department</a></li>
    <li role="presentation"><a href="#view-department" aria-controls="view-department" role="tab" data-toggle="tab">View Department</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-department">
      
      <div class="add-department">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">Department</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="department.php" method="POST" id="#form">
              <?php $Department->adddepartment();?>
                           <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Department name:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter department name" name="departmentname" class="form-control" value="<?php echo !empty($departmentname)?$departmentname:'';?>">
                  </div>
                       
        <div class="clearfix"> </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Department alias:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter department alias" name="departmentalias" class="form-control" value="<?php echo !empty($departmentalias)?$departmentalias:'';?>">
                  </div>
                       
        <div class="clearfix"> </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer"><button type="submit" class="btn btn-primary" name="add">Add department</button></div>
              <!-- /.box-footer -->
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-department">
      <div class="view-department">

         <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
            <div class="box-header" >
              <h2 class="box-title">View department</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>Departments</th>
                  <th>Department Alias</th>
                  <th>Action</th>
                </tr>
               
                   <?php $Department->viewdepartment();
                          $Department->deletedepartment();
                    ?>
              

                    </tr>
                    

                    
                    
                    <br/><br/>

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