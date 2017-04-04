<div role="tabpanel" class="tab-pane" id="enterstudentresult">
 <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#enterresult" aria-controls="enterresult" role="tab" data-toggle="tab">Enter Students' Result</a></li>
  <li role="presentation"><a href="#viewresults" aria-controls="viewresults" role="tab" data-toggle="tab">View Students' Result</a></li>


</ul>

<div class="tab-content">
 <div role="tabpanel" class="tab-pane active" id="enterresult">
   <div class="enterresult">
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title">Enter Students' scores</h2>
            </div>
            <!-- /.box-header -->


            <form role="form" class="form-inline" id="create" method="POST">
              <div class="box-body">
                <div class="form-group">

                 <label>Result type</label>   
                 <select name='resulttype'  required value="<?php echo !empty($resulttype)?$resulttype:'';?>">

                  <option value="Assignment">Assignment</option>
                  <option value="Test">Test</option>

                  <option value="Exam">Exam</option>

                </select>
                <input type="hidden" name="Instructorid" value="">
              </div>

              <button type="submit" name="getresultform">Go</button>
            </div>

          </form>

          <?php


          ?>

          <div class="box-body no-padding">
            <table class="table span12 table-stripped">

              <thead>
                <tr>

                  <th>s/n</th>
                  <th>Student Name</th>
                  <th>score</th>
                </tr>
              </thead>

              <tbody>
                <?php $Instructor->addscore();?>
                <?php $Instructor->processscore();?>
              </tbody>
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

<div role="tabpanel" class="tab-pane" id="viewresults">
  <div class="viewresults">

  <section class="content">
    <div class="row">


     <div class="box box-info blue-border" style="border:0px;">
       <div class="box-header" >
        <h2 class="box-title">Assignment Submissions</h2>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">

        <table class="table span12 table-stripped">

          <thead>
            <tr>

              <th>Student name</th>
              <th>Assignment Score</th>
              <th>Test Score</th>
              <th>Exam Score</th>
              <th>Total</th>
              <th>Grade</th>
              <th>Update</th>

            </tr>
          </thead>

          <tbody>


           <?php $Instructor->viewresult();
                  $Instructor->updatestudentscore();
           ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>

</section>



  </div>
</div>
</div>
</div>