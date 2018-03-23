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
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-"></i> <font color="white">Total stations</font></span>
              <div class="count" id="trucks"><font color="white">143</font></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-bicycle"></i> <font color="white">total bikes</font></span>
              <div class="count" id="time"><font color="white">123</font></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-bicycle"></i><font color="white"> Total used bikes</font></span>
              <div class="count green" id="bins"><font color="white">2,500</font></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i><font color="white"> Total users</font></span>
              <div class="count" id="fuel"><font color="white">989</font></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-road"></i><font color="white"> Total KMs</font></span>
              <div class="count" id="distance"><font color="white">2,315</font></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i><font color="white">Total hours</font></span>
              <div class="count"><font color="white">7325</font></div>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Used bikes </h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    </div>
                  </div>
                </div>

                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div> -->

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <canvas id="chart_index" class="demo-placeholder"></canvas> 
                </div>
                

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

        </div>
     </div>
   </div>

   <script type="text/javascript">

    $.ajax({
      url: "ajax/getCollectedBikes.php",
      success: function(data){
        var labels = [];
        var datasets = [];
        datasets.push('0');
        for(var i=0; i<data.data.length; i++){
          labels.push(data.data[i].label);
         // datasets.push(data.data[i].collected);
          
        }
        var ctx = document.getElementById("chart_index").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [{
                label: "used bikes",
                data: datasets
              }]
            }
          });
      }
    });
     
     $(document).ready(function(){
        $.ajax({
          url: 'ajax/getHistory.php',
          type: 'GET',
          success: function(data){
            console.log(data.changed);
            if(data.code == '200'){
              
              var distance = 0;
              var time = 0;
           
              var oil_spent = 0;  
              for(var i=0; i < data.data.length; i++){
                distance += parseInt(data.data[i].kilometers);
                time += parseInt(data.data[i].duration);
                //collected_bins += parseInt(data.data[i].collected_bins);
              }

              $("#distance").text(distance);
              $("#time").text(time);
              //$("#bins").text(collected_bins);
              
              $("#fuel").text(parseInt(distance/3));
              
            }
          }
        });


     });
   </script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

 <?php
  // amine's commit
   include './includes/footer.php';
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
