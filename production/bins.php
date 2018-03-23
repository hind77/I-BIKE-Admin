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
                    <h2>Bins Monitor  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#add_bin_modal">Add bin</button>
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
                            <th class="column-title text-center">Location</th>
                            <th class="column-title">Fill's level </th>
                            <th class="column-title no-link last text-center"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                              $query = $pdo->query('SELECT * FROM bins');
                              while($row = $query->fetch()){
                          ?>
                          <tr class="even pointer">
                            <td class="a-center">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class="text-center"><?php echo $row['name'];?></td>
                            <td class="text-center">
                              <a href="bins_map.php?<?php echo 'lat='.$row['location_lat'].'&lng='.$row['location_lng'];?>">
                                <?php echo '('.$row['location_lat'].','.$row['location_lng'].')';
                                ?>
                              </a>
                            </td>
                            <?php 
                              if($row['fill_level'] <= 50){
                                $class = 'progress-bar progress-bar-info';
                              }else if($row['fill_level'] < 80){
                                $class = 'progress-bar progress-bar-warning';
                              }else{
                                $class = 'progress-bar progress-bar-danger';
                              }
                            ?>
                            <td class=" ">
                              <div class="progress center">
                                <div class="<?php echo $class; ?>" 
                                    data-transitiongoal="<?php echo $row['fill_level']?>" id="<?php echo $row['id'];?>"></div>
                              </div>
                            </td>
                            <td class="last text-center"><button class="btn btn-danger" onclick="delbin(<?php echo $row['id']; ?>)">delete</button>
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

   <?php include 'add_bin_modal.php'; ?>

   <script type="text/javascript">

    function delbin(id){
      $.ajax({
        url: 'ajax/deleteBin.php?id=' + id,
        type: 'GET',
        success: function(data){
          console.log("Row deleted successfuly " + data.code);
          location.reload();
        }
      });
    }

    function addBin(){
      var name = $("#name").val();
      var location = $("#location").val();
      location = location.split(",");
      location[1].trim();

      $.ajax({
        url: "ajax/addBin.php?name=" + name + "&lat=" + location[0] + "&lng=" + location[1],
        success: function(data){
          if(data.code == "200"){
            window.location.reload();
          }else{
            window.alert("There was a problem adding the bin");
          }
        }
      });
    }
     
     $(document).ready(function(){

      var id = "";
      $('.progress-bar').each(function(index, obj){
        //id = $(obj).attr('id'); 
        id = '3';
        console.log(id);
        //alert($(objectG).attr('id'));
        setInterval(function(){
          $.ajax({
            url: 'http://192.168.43.10/ultrasonic.php?id=' + id,
            type: 'GET',  
            success: function(data){
              console.log(data.changed);
              if(data.changed == 'yes'){
                $("#"+id).css('width', data.fill_level+'%').attr('aria-valuenow', data.fill_level);
              }
            }
          });

          //alert($(objectG).attr(id));
        }, 2000);
      });

     });


     //url: 'ajax/getFillLevel.php?id=' + id

     // setInterval(function(){
     //  $.ajax({
     //    url: 'ajax/getFillLevel.php',
     //    type: 'GET',
     //    success: function(data){
     //      $('.progress-bar').css('width', data.fill_level+'%').attr('aria-valuenow', data.fill_level);
     //    }
     //  });
     // }
     //  , 6000);
   </script>

 <?php
    //first commit
   include 'includes/footer.php';
   include 'includes/page_Footer.php';
 ?>
