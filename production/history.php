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
                    <h2>History Monitor  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content"> 

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title text-center">ID history </th>
                            <th class="column-title text-center">ID Truck</th>
                            <th class="column-title text-center">Collected bins </th>
                            <th class="column-title text-center">Route start </th>
                            <th class="column-title text-center">Route finish </th>
                            <th class="column-title text-center">Distance </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                              $query = $pdo->query('SELECT * FROM history');
                              while($row = $query->fetch()){
                          ?>
                          <tr class="even pointer">
                            <td class="text-center"><?php echo $row['id_history'];?></td>
                            <td class="text-center"><?php echo $row['id_truck'];?></td>
                            <td class="text-center"><?php echo $row['collected_bins']; ?></td>
                            <td class="text-center"><?php echo $row['route_start']; ?></td>
                            <td class="text-center"><?php echo $row['route_finish']; ?></td>
                            <td class="text-center"><?php echo $row['n_kilometers']; ?></td>
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
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
   include 'includes/page_Footer.php';
 ?>
