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
                      <option value="1">Collected bins</option>
                      <option value="2">Driven distances (Km)</option>
                      <option value="3">Fuel consumption (l)</option>
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
        }else if(value == "2"){
          $.ajax({
            url: "ajax/getCollectedBins.php",
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
                      label: "collected bins",
                      data: datasets
                    }]
                  }
                });
            }
          });
        }else if(value == "3"){
          $.ajax({
            url: "ajax/getCollectedBins.php",
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
                      label: "collected bins",
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
   include 'includes/page_Footer.php';
 ?>
