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
            <div class="row">
              <input type="hidden" id="lat" value="<?php echo $_GET['lat'];?>">
              <input type="hidden" id="lng" value="<?php echo $_GET['lng'];?>">
              <div id="map" style="height:100%; width:100%;"></div>
            </div>
          </div>
        </div>
     </div>
   </div>

 <?php
    //first commit
   include 'includes/footer.php';
  ?>

  <script>
    function initMap() {
      var uluru = {lat: parseInt(document.getElementsByTagName('lat').value), lng: parseInt(document.getElementsByTagName('lng').value)};
      alert(uluru['lat']);
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5blDSwyynAWGAj8f_Od9pLCh0YhusLw&callback=initMap">
  </script>
  <?php
   include 'includes/page_Footer.php';
 ?>
