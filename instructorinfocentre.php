

<div role="tabpanel" class="tab-pane" id="instructor-info">
  <div class="instructor-info">

   <section class="content">
    <div class="row">


     <div class="box box-info blue-border" style="border:0px;">
      <div class="box-header with-border">
        <h3 class="box-title">Information</h3>
      </div>

      <form role="form"  action="" method="post" class="form-horizontal">

        <div class="box-body">

            <input type=" text" name="infotitle" placeholder="  Enter Information Title">
          <textarea name="info" rows="10" cols="100" placeholder="Post information here"></textarea>
          <?php $Instructor->postinformation()?>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="news">POST</button>
        </div>
      </form>

    </div>
  </div>

</section>

</div>
<!-- /.box -->

</div>