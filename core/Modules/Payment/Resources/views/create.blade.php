          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Payment</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('payment.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

              <div class="form-group">
                <label>Client</label>
                <select class="form-control" name="client" style="width: 100%" >
                  @foreach($clients as $client)
                  <option value="{{$client->id}}">{{$client->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>CC Client</label>
                <select class="form-control"  multiple="multiple" style="width: 100%" name="cc_client[]">
                  @foreach($clients as $client)
                  <option value="{{$client->id}}">{{$client->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Service</label>
                
                <select class="form-control" name="service" style="width: 100%" >
                  @foreach($services as $service)
                  <option value="{{$service->id}}">{{$service->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Source</label>
                <input type="text" class="form-control" placeholder="Source" name="source">
              </div>

              <div class="form-group">
                <label>Amount</label>
                <input type="number" class="form-control" placeholder="Amount" name="amount">
              </div>

              <div class="form-group">
                <label>Duration</label>
                <input type="number" class="form-control" placeholder="Duration (In Days)" name="duration">
              </div>

              <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" placeholder="Start Date" name="start_date">
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" onchange="toggleRepeatType(this)" name="repeat" value="1"> Repeat
                </label>
              </div>

              <div class="form-group">
                <label>Repeat Type</label>
                <select class="form-control" name="repeat_type" disabled="true" onchange="toggleRepeatDays(this)" style="width: 100%" >
                  <option>Daily</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  <option disabled>Quarterly</option>
                  <option disabled>By Annually</option>
                  <option disabled>Annually</option>
                  <option>Custom</option>
                </select>
              </div>

              <div class="form-group" >
                <label>Repeat Days (loop range)</label>
                <input type="number" class="form-control" placeholder="Repeat Days" name="custom_duration">
              </div>

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>