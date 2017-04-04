<div role="tabpanel" class="tab-pane" id="coursereg">
    <div class="coursereg">

     <section class="content">
      <div class="row">

        <div >

         <div class="box box-info blue-border" style="border:0px;">
          <div class="box-header with-border">
            <h3 class="box-title">Course Registration</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" class="form-inline" id="create" >
           <div class="box-body">
            <input type="hidden" name="studentid" value="<?php echo $id;?>">

            <div class="form-group">
              <label>Semester:</label>
              <select name="semesterid" required value="<?php echo !empty($semesterid)?$semesterid:'';?>">
                <option value="1">first semester</option>
                <option value="2">second semester</option>
              </select>
            </div>
            <div class="form-group">
              <label>Session:</label>
              <select name="session">
                <option value="1">2013/2014</option>
                <option value="2">2014/2015</option>
                <option value="3">2015/2016</option>
                <option value="4">2016/2017</option>
                <option value="5">2017/2018</option>
              </select>
            </div>
            <div class="form-group">
              <label>Level</label>

              <select name='levelid' class="form-control" required value="<?php echo !empty($levelid)?$levelid:'';?>">

                <?php $coursemgt->selectoption(level, 'level', 'level_id');?>

              </select>

            </div>

            <div class="form-group">
              <label>Department:</label>
              <select name='deptid' class="form-control" required value="<?php echo !empty($deptid)?$deptid:'';?>">

               <?php $coursemgt->selectoption(department,'department_name','department_id'); ?>

             </select>
           </div>
           <button id="submit" class="btn btn-primary btn-sm" type="submit" name="generatecourses">Generate courses</button>
         </div>
         <!-- /.box-body -->  
       </form>
     </div>


   </div>
 </div>

 <div class="box-body">


   <table class="table span12 table-stripped">

    <thead>
      <tr>
        <th>Select</th>
        <th>Course Code</th>
        <th>Course title</th>
        <th>Course Unit</th>
        <th>Course Status</th>
        <!--  <th>Action</th> -->
      </tr>
    </thead>

    <tbody>
        <?php $Student->courseregistration();
              $Student->submitregisteredcourses();
        ?>
    </tbody>
  </table>


</div>
</section>

</div>
<!-- /.box -->

</div>