<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Edit Service</h4>
</div>
<div class="modal-body">
  <form class="ajax-submit" action="{{route('service.update',['id'=>$service->id])}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">
<input name="_method" type="hidden" value="PUT">
    <div class="form-group">
      <label>Service Name</label>
      <input type="text" class="form-control" placeholder="Service Name" name="service_name" value="{{$service->name}}">
    </div>

    <div class="form-group">
      <label>Service Type</label>
      <select class="form-control" name="service_type">
        <option value="">---Select---</option>
        <option {{($service->service_type == 'Domain')?'selected':''}}>Domain</option>
        <option {{($service->service_type == 'Hosting')?'selected':''}}>Hosting</option>
        <option {{($service->service_type == 'Email')?'selected':''}}>Email</option>
        <option {{($service->service_type == 'Development')?'selected':''}}>Development</option>
        <option {{($service->service_type == 'Consultation')?'selected':''}}>Consultation</option>
      </select>
    </div>

    <div class="form-group">
      <label>Due Percentage</label>
      <input type="number" class="form-control" placeholder="Due Pecentage" name="due_percentage" value="{{$service->due_percentage}}">
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea class="form-control" name="description">{{$service->description}}</textarea>
    </div>

    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>

  </form>


</div>