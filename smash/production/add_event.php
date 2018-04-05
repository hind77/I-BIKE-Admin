<?php
  include 'includes/header.php';
 ?>

 <body class="nav-md">
   <div class="container body">
     <div class="main_container">
       <?php
          include 'includes/side_bare.php';
          include 'includes/top_navigation.php';
        ?>
        <div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Add Event </h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form>
                  <div class="form-group col-md-6">
                    <label for="recipient-name" class="form-control-label">Event Title</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="message-text" class="form-control-label">Description</label>
                    <textarea class="form-control" id="description"></textarea> 
                  </div>
                  <div class="form-group col-md-6">
                     <span class="glyphicon glyphicon-calendar"></span>
                    <label for="message-text" class="form-control-label">Date</label>
                    <input type="date" class="form-control" id="date">

                  </div>
                 
               
                  
                </form>
                <br>
                <div class="form-group col-md-6">
                    <button class="btn btn-primary " onclick="addevent();"> Add Event</button>
                  </div>
              </div>
            </div>
            
          </div>
        </div>
     </div>
   </div>

   <script type="text/javascript">
     function addevent(){
        var name = $("#name").val();
        var description = $("#description").val();
        var date = $("#date").val();
       


        $.ajax({
         
             type: "GET",
            url: "ajax/addEvent.php",
            data: {name:name,description:description,date:date},
            dataType: "JSON",
        
          success: function(data){
            if(data.code == "200"){

             window.alert("the event is added");
              
            }else{
              window.alert("There was a problem adding the user");
            }
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
