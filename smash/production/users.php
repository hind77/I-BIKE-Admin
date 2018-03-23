<?php
  include 'includes/header.php';
  include 'includes/db.php';
 ?>

 <body class="nav-md">
   <div class="container body">
     <div class="main_container">
       <?php
          include 'includes/side_bare.php';
          include 'includes/top_navigation.php';
        ?>

        <!-- Table start-->
        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users Monitor  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content"> 

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title text-center">Username </th>
                            <th class="column-title text-center">First name</th>
                            <th class="column-title text-center">Last name </th>
                            <th class="column-title text-center">Email </th>
                            <th class="column-title no-link last text-center"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                              $query = $pdo->query('SELECT * FROM users');
                              while($row = $query->fetch()){
                          ?>
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class="text-center"><?php echo $row['username'];?></td>
                            <td class="text-center"><?php echo $row['first_name'];?></td>
                            <td class="text-center"><?php echo $row['last_name']; ?></td>
                            <td class="text-center"><?php echo $row['email']; ?></td>
                            <td class="last text-center"><button class="btn btn-danger" onclick="deluser(<?php echo $row['id_user']; ?>)">delete</button>
                            </td>
                          </tr>
                          <?php }
                          ?>
                        </tbody>
                      </table>
                    </div>
              
            
                  </div>
                </div>
              </div>
        </div>
        <!-- Table end-->
     </div>
   </div>

   <script type="text/javascript">
     function deluser(id){
        $.ajax({
          url: 'ajax/deleteUser.php?id=' + id,
          type: 'GET',
          success: function(data){
            console.log("Row deleted successfuly " + data.code);
            location.reload();
          }
        });
      }
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
 ?>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>
</html>
