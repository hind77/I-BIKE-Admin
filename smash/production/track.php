<?php
  include 'includes/header.php';
  include 'includes/db.php';
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
            <div class="row">
             

              <div id="map"></div>
            </div>
          </div>
        </div>
     </div>
   </div>
    <script>
     
    window.lat = 33.984408;
    window.lng = -6.868419;

    function circlePoint(time) {
      var radius = 0.01;
      var x = Math.cos(time) * radius;
      var y = Math.sin(time) * radius;
      
      return {lat:window.lat + x, lng:window.lng + y};
    };

    var map;
    var mark;

    var initialize = function() {
      
          var image = {
              url: 'images/bike.png', // image is 512 x 512
              scaledSize : new google.maps.Size(32, 42)
            };
      map  = new google.maps.Map(document.getElementById('map'), {center:{lat:lat,lng:lng},zoom:13});
      mark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map, icon:image});
   
      };
 

    window.initialize = initialize;

    var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;

      map.setCenter({lat:lat, lng:lng, alt:0});
      mark.setPosition({lat:lat, lng:lng, alt:0});
    };

    var pnChannel = "map-channel";

    var pubnub = new PubNub({
     publishKey:   'pub-c-1d9bcc61-aa71-4ae8-a3e3-bb1c2cf56a8a',
      subscribeKey: 'sub-c-b9caae24-2c2e-11e8-a9ec-66e903312baa'
    });

    pubnub.subscribe({channels: [pnChannel]});
    pubnub.addListener({message:redraw});

    setInterval(function() {
      pubnub.publish({channel:pnChannel, message:circlePoint(new Date().getTime()/1000)});
    }, 500);

    </script>
     <?php
    //first commit
   include 'includes/footer.php';
 ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC_Rm8xnEUz_VVViXvhxpAe1yN-uVzTg-Y&callback=initialize"></script>

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