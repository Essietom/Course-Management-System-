<div role="tabpanel" class="tab-pane" id="information">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#assignment" aria-controls="assignment" role="tab" data-toggle="tab">Assignment</a></li>
    <li role="presentation"><a href="#submision" aria-controls="submision" role="tab" data-toggle="tab">Assignment submission</a></li>
    <li role="presentation"><a href="#generalinfo" aria-controls="generalinfo" role="tab" data-toggle="tab">General Information</a></li>

  </ul>

  <div class="tab-content">
   <div role="tabpanel" class="tab-pane active" id="assignment">
     <div class="assignment">
       <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header" >
                <h2 class="box-title">Assignments</h2>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">

                <table class="table span12 table-stripped">

                  <thead>
                    <tr>

                      <th>Course Code</th>
                      <th>Course title</th>
                      <th>Deadline</th>
                      <th>Download</th>

                    </tr>
                  </thead>

                  <tbody>


                   <?php $Student->downloadassignment();?>
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

 <div role="tabpanel" class="tab-pane" id="submision">
   <div class="submision">
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header" >
              <h2 class="box-title">Assignment Submission</h2>
            </div>
            <!-- /.box-header -->


            <form role="form" class="form-inline" id="create">
              <div class="box-body">
                <div class="form-group">

                 <label>Course</label>   
                 <select name='course'  required value="<?php echo !empty($course)?$course:'';?>">

                 <?php $coursemgt->selectoption(courses, 'course_name', 'course_id');?>

                </select>
              </div>

              <button type="submit" name="uploadsubmission">Go</button>
            </div>

          </form>



          <div class="box-body no-padding">

           <?php $Student->uploadsubmission();?>
         </div>
         <!-- /.box-body -->

       </div>
       <!-- /.box -->
     </div>
   </div>
 </section>

</div>
</div>   
             
     <div role="tabpanel" class="tab-pane" id="generalinfo">
       <div class="generalinfo">
         <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
            <div class="box-header" >
              <h2 class="box-title">General information</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
           
             <?php $Student->getinformation();?>
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
             
    </div>

