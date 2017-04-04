
<div role="tabpanel" class="tab-pane" id="view-regcourses">
  <div class="view-regcourses">

   <section class="content">
    <div class="row">


       <div class="box box-info blue-border" style="border:0px;">
        <div class="box-header with-border">
          <h3 class="box-title">Course Management</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

      </div>

  </div>

  <div class="box-body">


    <table class="table span12 table-stripped">

      <thead>
        <tr>
          <th>S/n</th>
          <th>Course Code</th>
          <th>Course title</th>
          <th>Course Unit</th>
          <th>Course Status</th>

        </tr>
      </thead>

      <tbody>



        <?php
        $Student->viewregisteredcourses();
        ?>  
      </tbody>
    </table>


  </div>
</section>

</div>
<!-- /.box -->

</div>
<!-- /.col-lg-5 -->