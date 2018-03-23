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
          url: 'ajax/getBins.php',
          success: function(data){
            var image = {
              url: 'images/bin_marker.png', // image is 512 x 512
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
                                '<p> Fill level : ' + data.data[i].fill_level +
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
   include 'includes/page_Footer.php';
 ?>
