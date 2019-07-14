{{--           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Client</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('client.update',['id'=>$client->id])}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">
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

            
          </div> --}}


          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Payment</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('payment.update',['id'=>$payment->id])}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

              <div class="form-group">
                <label>Client</label>
                <select class="form-control" name="client" style="width: 100%">
                  @foreach($clients as $client)
                  <option value="{{$client->id}}" {{$client->id == $payment->client_id ? 'selected':''}}>{{$client->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>CC Client</label>
                <select class="form-control select2" multiple name="cc_client" multiple="multiple" style="width: 100%">
                  @foreach($clients as $client)
                  <option value="{{$client->id}}" {{ in_array($client->id, $payment_cc) ? 'selected':''}}>{{$client->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Service</label>
                
                <select class="form-control" name="service" style="width: 100%">
                  @foreach($services as $service)
                  <option value="{{$service->id}}" {{$service->id == $payment->service_id ? 'selected':''}}>{{$service->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Source</label>
                <input type="text" class="form-control" placeholder="Source" name="source" value="{{$payment->source}}">
              </div>

              <div class="form-group">
                <label>Amount</label>
                <input type="number" class="form-control" placeholder="Amount" name="amount" value="{{$payment->amount}}">
              </div>

              <div class="form-group">
                <label>Duration</label>
                <input type="number" class="form-control" placeholder="Duration (In Days)" name="duration" value="{{$payment->duration}}">
              </div>

              <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{$payment->start_date}}">
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" onchange="toggleRepeatType(this)" name="repeat" value="1" {{ $payment->repeat == 1 ? 'checked' : '' }}> Repeat
                </label>
              </div>

              <div class="form-group">
                <label>Repeat Type</label>
                <select class="form-control" name="repeat_type" disabled="true" onchange="toggleRepeatDays(this)" style="width: 100%">
                  <option {{ $payment->repeat_type == 'Daily' ? 'seleted' : '' }}>Daily</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'Weekly' : '' }}>Weekly</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'Monthly' : '' }}>Monthly</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'Quarterly' : '' }}>Quarterly</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'By Annually' : '' }}>By Annually</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'Annually' : '' }}>Annually</option>
                  <option {{ $payment->repeat_type == 'Daily' ? 'Custom' : '' }}>Custom</option>
                </select>
              </div>

              <div class="form-group" >
                <label>Repeat Days (loop range)</label>
                <input type="number" class="form-control" placeholder="Repeat Days" name="custom_duration" value="{{$payment->custom_duration}}">
              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>