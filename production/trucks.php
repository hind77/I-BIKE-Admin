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
                    <h2>Trucks Monitor  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#add_truck_modal">Add truck</button>
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
                            <th class="column-title text-center">Name </th>
                            <th class="column-title text-center">Capacity</th>
                            <th class="column-title text-center">Driver </th>
                            <th class="column-title text-center">Available </th>
                            <th class="column-title no-link last text-center"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                              $query = $pdo->query('SELECT * FROM trucks');
                              while($row = $query->fetch()){
                          ?>
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class="text-center"><?php echo $row['name'];?></td>
                            <td class="text-center"><?php echo $row['capacity'];?></td>
                            <td class="text-center"><?php echo $row['driver']; ?></td>
                            <?php 
                              if($row['is_available'] == 1){
                                $class = 'Yes';
                              }else if($row['is_available'] == 0){
                                $class = 'No';
                              }
                            ?>
                            <td class="text-center"><?php echo $class; ?></td>
                            <td class="last text-center"><button class="btn btn-danger" onclick="deltruck(<?php echo $row['id_truck']; ?>)">delete</button>
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



   <?php include 'add_truck_modal.php'; ?>

   <script type="text/javascript">
     function deltruck(id){
        $.ajax({
          url: 'ajax/deleteTruck.php?id=' + id,
          type: 'GET',
          success: function(data){
            console.log("Row deleted successfuly " + data.code);
            location.reload();
          }
        });
      }

      function addTruck(){
        var name = $("#name").val();
        var capacity = $("#capacity").val();
        var driver = $("#driver").val();


        $.ajax({
          url: "ajax/addTruck.php?name=" + name + "&capacity=" + capacity + "&driver=" + driver,
          success: function(data){
            if(data.code == "200"){
              window.location.reload();
            }else{
              window.alert("There was a problem adding the bin");
            }
          }
        });
      }
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
   include 'includes/page_Footer.php';
 ?>
