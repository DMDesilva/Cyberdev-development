<script>$(document).ready(function() {
        $('#multiselect').select2();
    });
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Developer Group</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('developergroup.update',['id'=>$developergroup->id])}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">
        <div class="form-group">
            <input name="_method" type="hidden" value="PUT">
            <label>Project Name</label>
            <input type="text" class="form-control" placeholder="Project Name" name="name" value="{{$developergroup->name}}">
        </div>
        <div class="form-group">
            <label>Clients</label>
            <select class="form-control" id="multiselect" multiple="multiple" name="developers[]" data-placeholder="Select developers" style="width: 100%;">
                @foreach($developers as $developer)
                    <option value="{{$developer->id}}"
                            {{$key = array_search($developer->id,$developersOfGroup, true)}}
                            {{ ($key !== false) ? 'selected':''}}>
                        {{$developer->firstname}} {{$developer->lastname}}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>