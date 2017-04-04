  <?php
  require 'header.php';

  require "functions/functions.php";
  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Mgt
        <small>Open courseware</small>
      </h1>

    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">

          <div class="box box-solid bg-white-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Open courseware</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <section class="content">
                <div class="row">


                 <div class="box box-info blue-border">
                  <div class="box-header with-border">
                    <h3 class="box-title">Open courseware</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" class="form-inline" id="create" method="POST">

                    <div class="box-body">

                      <div class="form-group">
                        <label>Select department:</label>
                        <select name='department' class="form-control" required value="<?php echo !empty($department)?$department:'';?>">

                          <?php $coursemgt->selectoption(department,'department_name','department_id'); ?>

                        </select>
                      </div>

                      <button id="submit" class="btn btn-primary" type="submit" name="seecoursenotes" >See course materials</button>
                    </div>
                    <!-- /.box-body -->




                  </form>
                </div>


              </div>
            </div>

           

            <div class="row">
              <div class="col-lg-12">
                <div class="box box-solid">

                  <div class="box-body">

                   <!-- <button class="btn btn-info" onclick="javascript:downloadPDF()">DOWNLOAD PDF</button> -->

                   <div id="pay-report" class="col-md-12">
                    <table class="table span12 table-stripped">



                      <thead>
                        <tr class="alert alert-info">

                          <th>S/N</th>
                          <th>Course code</th>

                          <th>Course title</th>
                          <th>Download</th>



                        </tr>
                      </thead>

                      <tbody>
                        <?php 

                        $coursemgt->departmentalcourses();

                        ?>




                      </tbody>


                    </table>
                  </div>


                </div>
                <!-- /.box-body -->


              </div>
              <!-- /.box -->

            </div>
            <!-- /.col-lg-5 -->

          </div>
        </div>
      </section>


    </div>

  </div>
</div>
</section>
</div>

<?php include "footer.php"; ?>