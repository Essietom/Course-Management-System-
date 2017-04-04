

<div role="tabpanel" class="tab-pane" id="view-result">
  <div class="view-result">

   <section class="content">
    <div class="row">

      <div >

       <div class="box box-info blue-border" style="border:0px;">
        <div class="box-header with-border">
          <h3 class="box-title">Check Result</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" class="form-inline" id="create" method="POST">
         <div class="box-body">

          <div class="form-group">
            <label>Semester:</label>
            <select name='semesterid'>
              <option value='1'>first semester</option>
              <option value='2'>second semester</option>
            </select>
          </div>
          <div class="form-group">
            <label>Session:</label>
            <select name='sessionid'>
              <option value='1'>2013/2014</option>
              <option value='2'>2014/2015</option>
              <option value='3'>2015/2016</option>
              <option value='4'>2016/2017</option>
              <option value='5'>2017/2018</option>
            </select>
          </div>

          <button id="submit"  type="submit" name="viewresult" >Check</button>

        </div>
        <!-- /.box-body -->



      </form>
    </div>


  </div>
</div>

<div class="box-body">


 
       <?php
        $Student->viewresult();
        ?>  

  
  


</div>
</section>

</div>
<!-- /.box -->

</div>
<!-- /.col-lg-5 -->