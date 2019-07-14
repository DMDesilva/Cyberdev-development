          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Client</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('client.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="full_name">
              </div>

              <div class="form-group">
                <label>Good Name</label>
                <input type="text" class="form-control" placeholder="Good Name" name="good_name">
              </div>

              <div class="form-group">
                <label>Contact No</label>
                <input type="text" class="form-control" placeholder="Contact No" name="contact_no">
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email_address">
              </div>

              <div class="form-group">
                <label>Currency</label>
                <select class="form-control" name="currency">
                  <option>LKR</option>
                  <option>USD</option>
                </select>
              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>