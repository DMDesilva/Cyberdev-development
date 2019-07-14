<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Mail Type</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('mailtype.update',['id'=>$mailtype->id])}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{$mailtype->name}}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" placeholder="Description" name="description">{{$mailtype->description}}</textarea>
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>