<?php
  include 'includes/header.php';

 ?>
 <style>
  #map {
    height: 600px;
    width: 100%;
  }
 </style>

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
			 			<h2> map </h2>
			 			<ul class="nav navbar-right panel_toolbox">
                      		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      		<li class="dropdown">
                        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        		<ul class="dropdown-menu" role="menu">
                          			<li><a href="#">Settings 1</a></li>
                          			<li><a href="#">Settings 2</a></li>
                        		</ul>
                      		</li>
                      		<li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    	</ul>
                    	<div class="clearfix"></div>
			 		</div>
			 		
			 		<div class="x_content">
            <div id="map"></div>
			 		</div>
			 </div>
        </div>
     </div>
   </div>

   <script>

      $(document).ready(function(){
        // var parsedData;

        // // $.ajax({
        // //   url: 'ajax/getBins.php',
        // //   success: function(data){
        // //     parsedData = data;
        // //   }
        // // });

        // console.log(parsedData.data[0].name);
      });

      function initMap() {

        $.ajax({
          url: 'ajax/getstations.php',
          success: function(data){
            var image = {
              url: 'images/bike.png', // image is 512 x 512
              scaledSize : new google.maps.Size(32, 42)
            };
            console.log(parseFloat(data.data[0].lat));
            console.log(parseFloat(data.data[0].lng));
            var uluru = {lat: parseFloat(data.data[0].lat), lng: parseFloat(data.data[0].lng)};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: uluru
            });

            for(var i=0; i<data.data.length; i++){
              var marker = new google.maps.Marker({
                position: {lat: parseFloat(data.data[i].lat), lng: parseFloat(data.data[i].lng)},
                map: map,
                icon: image
              });

              var window_info = '<div id="window_content">'+
                                '<h1>' + data.data[i].name + '</h1>'+
                                '<br>' +
                                '<p> Location : (' + data.data[i].lat + ', ' + data.data[i].lng + ') </p>'+
                                '<p> capacity : ' + data.data[i].num_bikes +
                                '</div>';

              var infowindow = new google.maps.InfoWindow({
                content: window_info
              });

              marker.addListener('click', function(){
                infowindow.open(map, marker);
              });
            }
          }
        });

        



        // var marker = new google.maps.Marker({
        //   position: {lat: 33.984761, lng: -6.868353},
        //   map: map,
        //   icon: image

        // });
        // var marker = new google.maps.Marker({
        //   position: {lat: 33.984678, lng: -6.865697},
        //   map: map,
        //   icon: image
        // });
        // var marker = new google.maps.Marker({
        //   position: {lat: 33.987491, lng: -6.859484},
        //   map: map,
        //   icon: image
        // });
        // var marker = new google.maps.Marker({
        //   position: {lat: 33.981728, lng: -6.865113},
        //   map: map,
        //   icon: image
        // });
      }
   </script>
   <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeANH4yYni6Rsvthg_Ax2_SVRz5pRc260&callback=initMap">
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
