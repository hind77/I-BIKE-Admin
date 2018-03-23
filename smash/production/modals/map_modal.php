<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id="map"></div>
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 17,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
      </div>
    </div>
  </div>
</div>