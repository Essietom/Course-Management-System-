
        <div role="tabpanel" class="tab-pane" id="lecturenote">
         <div class="assignment">

           <section class="content">
            <div class="row">


             <div class="box box-info blue-border" style="border:0px;">
              <div class="box-header with-border">
                <h3 class="box-title">Upload Lecture Notes</h3>
              </div>
              <form role="form" class="form-inline" id="create" method="POST">
              <div class="box-body">
                <div class="form-group">

                 <label>Department</label>   
                <select name='deptid' class="form-control" required value="<?php echo !empty($deptid)?$deptid:'';?>">

               <?php $coursemgt->selectoption(department,'department_name','department_id'); ?>

             </select>
                
              </div>

              <button type="submit" name="uploadnote">Go</button>
            </div>

          </form>

          <div class="box-body no-padding">

           <?php $Instructor->uploadlecturenote();?>
         </div>

            </div>
          </div>

        </section>

      </div>
    </div>
  </div>
</div>