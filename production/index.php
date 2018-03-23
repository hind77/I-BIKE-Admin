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
              <span class="count_top"><i class="fa fa-truck"></i> Total Trucks</span>
              <div class="count" id="trucks">143</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count" id="time">123.50</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-trash"></i> Total collected bins</span>
              <div class="count green" id="bins">2,500</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-glass"></i> Total Fuel spent (liters)</span>
              <div class="count" id="fuel">989</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-road"></i> Total KMs</span>
              <div class="count" id="distance">2,315</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7325</div>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Collected trash </h3>
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
      url: "ajax/getCollectedBins.php",
      success: function(data){
        var labels = [];
        var datasets = [];
        datasets.push('0');
        for(var i=0; i<data.data.length; i++){
          labels.push(data.data[i].label);
          datasets.push(data.data[i].collected);
          
        }
        var ctx = document.getElementById("chart_index").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [{
                label: "collected bins",
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
              var trucks = data.trucks;
              var distance = 0;
              var time = 0;
              var collected_bins = 0;
              var oil_spent = 0;  
              for(var i=0; i < data.data.length; i++){
                distance += parseInt(data.data[i].n_kilometers);
                time += parseInt(data.data[i].n_hours);
                collected_bins += parseInt(data.data[i].collected_bins);
              }

              $("#distance").text(distance);
              $("#time").text(time);
              $("#bins").text(collected_bins);
              $("#trucks").text(trucks);
              $("#fuel").text(parseInt(distance/3));
              
            }
          }
        });


     });
   </script>

 <?php
  // amine's commit
   include 'includes/footer.php';
   include 'includes/page_Footer.php';
 ?>
