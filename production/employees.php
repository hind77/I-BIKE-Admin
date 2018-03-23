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
                    <h2>Employees Monitor  </h2>
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
                              $query = $pdo->query('SELECT * FROM employees');
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
                            <td class="last text-center"><button class="btn btn-danger" onclick="delemployee(<?php echo $row['id_employee']; ?>)">delete</button>
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
     function delemployee(id){
        $.ajax({
          url: 'ajax/deleteEmployee.php?id=' + id,
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
   include 'includes/page_Footer.php';
 ?>
