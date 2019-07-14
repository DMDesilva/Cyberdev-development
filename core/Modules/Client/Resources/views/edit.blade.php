          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Client</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('client.update',['id'=>$client->id])}}" method="get" onsubmit="event.preventDefault(); directSubmit(this);">
            <input name="_method" type="hidden" value="PUT">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="{{$client->name}}">
              </div>

              <div class="form-group">
                <label>Good Name</label>
                <input type="text" class="form-control" placeholder="Good Name" name="good_name" value="{{$client->good_name}}">
              </div>

              <div class="form-group">
                <label>Contact No</label>
                <input type="text" class="form-control" placeholder="Contact No" name="contact_no" value="{{$client->contact_no}}">
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email_address" value="{{$client->email}}">
              </div>

              <div class="form-group">
                <label>Currency</label>
                <select class="form-control" name="currency">
                  <option {{($client->currency == 'LKR') ? 'selected':''}}>LKR</option>
                  <option {{($client->currency == 'USD') ? 'selected':''}}>USD</option>
                </select>
              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>