  <?php
  require 'header.php';

  require "functions/functions.php";
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Mgt
        <small>Change Password</small>
      </h1>

    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">

            <section class="content">
               
         
            <div class="row">
              <div class="col-lg-12">
                <div class="box box-solid">

                  <div class="box-body">

                  <form class="form-horizontal" action="changepassword.php" method="POST" id="#form">
              <?php $coursemgt->changepassword()?>
                           <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username:</label>

                  <div class="col-sm-8">
                    <input input type="text" required placeholder="Enter username" name="username" class="form-control" value="<?php echo !empty($username)?$username:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">Old password:</label>

                  <div class="col-sm-8">
                    <input input type="password" required placeholder="Enter old password" name="oldpword" class="form-control" value="<?php echo !empty($oldpword)?$oldpword:'';?>">
                  </div>
                          
        <div class="clearfix"> </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">New password:</label>

                  <div class="col-sm-8">
                    <input input type="password" required placeholder="Enter new password" name="newpword" class="form-control" value="<?php echo !empty($newpword)?$newpword:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>

        
        <div class="form-group">
                  <label class="col-sm-2 control-label">Confirm new password:</label>

                  <div class="col-sm-8">
                    <input input type="password" required placeholder="Confirm new password" name="confirm" class="form-control" value="<?php echo !empty($confirm)?$confirm:'';?>">
                  </div>
                         
        <div class="clearfix"> </div>
                </div>

       
      
              </div>
              <!-- /.box-body -->
              <div class="box-footer"><button type="submit" class="btn btn-primary" name="change">Change password</button></div>
              <!-- /.box-footer -->
            </form>


                </div>
                <!-- /.box-body -->


              </div>
              <!-- /.box -->

          
          </div>
        </div>
      </section>

  </div>
</div>
</section>
</div>

<?php include "footer.php"; ?>