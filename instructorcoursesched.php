<div role="tabpanel" class="tab-pane" id="coursesched">
                <div class="coursesched">

                  <section class="content">
                    <div class="row">

                      <div >

                       <div class="box box-info blue-border" style="border:0px;">
                        <div class="box-header with-border">
                          <h3 class="box-title">Course Scheduling</h3>
                        </div>

                      </div>

                      <?php $Instructor->schedulecourse();
                      $Instructor->schedulecourseprocess();
                      ?>
                    </div>

                  </div>
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

                              <th>Venue</th>
                              <th>Time</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php   $Instructor->viewcourseschedule();
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
           <!-- /.box -->

         </div>