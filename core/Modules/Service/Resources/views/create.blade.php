          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Service</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('service.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

              <div class="form-group">
                <label>Service Name</label>
                <input type="text" class="form-control" placeholder="Service Name" name="service_name">
              </div>

              <div class="form-group">
                <label>Service Type</label>
                <select class="form-control" name="service_type">
                  <option value="">---Select---</option>
                  <option>Domain</option>
                  <option>Hosting</option>
                  <option>Email</option>
                  <option>Development</option>
                  <option>Consultation</option>
                </select>
              </div>

              <div class="form-group">
                <label>Due Percentage</label>
                <input type="number" class="form-control" placeholder="Due Pecentage" name="due_percentage">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>