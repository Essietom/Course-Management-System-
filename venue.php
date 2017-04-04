<?php

include 'header.php';

if($role!='admin'){
  echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
  exit();
}

require 'classes/venueclass.php';

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
    <div role="tabpanel" class="tab-pane active" id="venue">
      <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#add-venue" aria-controls="add-venue" role="tab" data-toggle="tab">Add venue</a></li>
    <li role="presentation"><a href="#view-venue" aria-controls="view-venue" role="tab" data-toggle="tab">View venue</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="add-venue">
      
      <div class="add-venue">
             
             <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <!-- left column -->
        <div class="col-md-6">

           <div class="box box-info blue-border">
            <div class="box-header with-border">
              <h3 class="box-title">venue</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="POST" >
              <?php $Venue->addvenue();?>
                           <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Venue:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter Venue" name="venue" class="form-control" value="<?php echo !empty($venue)?$venue:'';?>">
                  </div>
                          
        <div class="clearfix"> </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Capacity:</label>

                  <div class="col-sm-10">
                    <input input type="text" required placeholder="Enter Hall capacity" name="capacity" class="form-control" value="<?php echo !empty($capacity)?$capacity:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer"><button type="submit" class="btn btn-primary" name="add">Add venue</button></div>
              <!-- /.box-footer -->
            </form>
          </div>


        </div>
      </div>
    </section>


              </div>
              
    </div>
 <div role="tabpanel" class="tab-pane" id="view-venue">
      <div class="view-venue">

         <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
            <div class="box-header" >
              <h2 class="box-title">View venue</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th>s/n</th>
                  <th>venue</th>
                  <th>capacity</th>
                  <th>Action</th>
               
                   <?php 
             $Venue->viewvenue();
             $Venue->deletevenue();
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