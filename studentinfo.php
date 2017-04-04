  
    <div role="tabpanel" class="tab-pane active" id="personaldata">

      <div class="add-course">

       <section class="content">
         <?php $Student->displaystudentpersonaldata();
         ?>

       </section>
     </div>
   </div>


   <div role="tabpanel" class="tab-pane" id="view-coursesched">
    <div class="view-coursesched">

     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header" >
              <h2 class="box-title">View Course Schedule</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>course code</th>
                    <th>course title</th>
                    <th>Instructor</th>
                    <th>Venue</th>
                    <th>Time</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>

                  <tbody>
                    <?php   $Student->viewcourseschedule();
                    ?>

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