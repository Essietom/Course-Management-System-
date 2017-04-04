
        <!-- /.col-lg-5 -->
<div role="tabpanel" class="tab-pane" id="assignmentsubmission">
  <div class="assignmentsubmission">

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

              <th>Course Code</th>
              <th>Course Title</th>
              <th>Date submitted</th>
              <th>Download</th>

            </tr>
          </thead>

          <tbody>


            <?php $Instructor->downloadsubmission();?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</section>

</div>
<!-- /.box -->

</div>