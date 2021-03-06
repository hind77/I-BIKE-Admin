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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Statistics</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Line graph</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select class="form-control" onchange="change();" id="selectMenu">
                      <option>Choose option</option>
                      <option value="1">Used Bikes</option>
                      <option value="2">Driven distances (Km)</option>
                      <option value="3">Hours</option>
                    </select>
                  </div>
                </div>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="chart_index"></canvas>
              </div>
            </div>
          </div>
        </div>
     </div>
   </div>

   <script type="text/javascript">
     
      function change(){

        var e = document.getElementById("selectMenu");
        var value = e.options[e.selectedIndex].value;

        if(value == '1'){
          var trace1 = {
  x: ['Total Bikes', 'Total Stations', 'Total Used Bikes', 'Total Users', 'Total KMs', 'Total Hours'],
  y: [120, 10, 200, 70, 150, 300],
  marker:{
    color: ['rgb(192, 232, 173)', 'rgb(109, 24, 45)', 'rgb(46, 138, 215)', 'rgb(183, 138, 215)', 'rgb(236, 252, 67)', 'rgb(255, 142, 30)']
  },
  type: 'bar'
};

var data = [trace1];

var layout = {
  title: 'I-Bike'
};

Plotly.newPlot('myDiv', data, layout);
         }
        }else if(value == "2"){
          $.ajax({
            url: "ajax/getCollectedBikes.php",
            success: function(data){
              var labels = [];
              var datasets = [];
              datasets.push('0');
              for(var i=0; i<data.data.length; i++){
                labels.push(data.data[i].label);
                datasets.push(data.data[i].data);
                
              }
              var ctx = document.getElementById("chart_index").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
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
        }else if(value == "3"){
          $.ajax({
            url: "ajax/getCollectedBikes.php",
            success: function(data){
              var labels = [];
              var datasets = [];
              datasets.push('0');
              for(var i=0; i<data.data.length; i++){
                labels.push(data.data[i].label);
                datasets.push(data.data[i].data/3);
                
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
        }

        
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
