<div class="modal fade" id="add_truck_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Truck</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Name</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Capacity</label>
            <input type="text" class="form-control" id="capacity">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Driver</label>
            <input type="text" class="form-control" id="driver">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addTruck();">Add Truck</button>
      </div>
    </div>
  </div>
</div>