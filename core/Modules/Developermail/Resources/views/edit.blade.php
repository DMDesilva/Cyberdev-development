<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Developer Mail</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('developermail.update',['id'=>$developermail->id])}}" method="post" onsubmit="event.preventDefault(); directSubmitDevMail(this);">
        <input name="_method" type="hidden" value="PUT">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{$developermail->name}}">
        </div>

        <div class="form-group">
            <label>Mail Type</label>
            <select class="form-control" style="width: 100%" name="mailtype">
                @foreach($mailtypes as $mailtype)
                    <option value="{{$mailtype->id}}" {{$mailtype->id == $developermail->service_id ? 'selected':''}}>{{$mailtype->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Developer Group</label>
            {{print_r($developermail_groups)}}
            <select class="form-control"  multiple="multiple" style="width: 100%" id="devgroups" name="devgroups[]">
                @foreach($developergroups as $developergroup)
                    <option value="{{$developergroup->id}}" {{ in_array($developergroup->id, $developermail_groups) ? 'selected':''}}>{{$developergroup->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Developers</label>
            {{print_r($developermail_developers)}}
            <select class="form-control"  multiple="multiple" style="width: 100%" id="developers" name="developers[]">
                @foreach($developers as $developer)
                    <option value="{{$developer->id}}" {{ in_array($developer->id, $developermail_developers) ? 'selected':''}}>{{$developer->firstname}} {{$developer->lastname}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Duration</label>
            <input type="number" class="form-control" placeholder="Duration (In Days)" name="duration" value="{{$developermail->duration}}">
        </div>

        <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{$developermail->start_date}}">
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" onchange="toggleRepeatType(this)" name="repeat" value="1" {{ $developermail->repeat == 1 ? 'checked' : '' }}> Repeat
            </label>
        </div>

        <div class="form-group">
            <label>Repeat Type</label>
            <select class="form-control" name="repeat_type" {{ $developermail->repeat == 1 ? '' : 'disabled="true"' }} onchange="toggleRepeatDays(this)" style="width: 100%">
                <option {{ $developermail->repeat_type == 'Daily' ? 'seleted' : '' }}>Daily</option>
                <option {{ $developermail->repeat_type == 'Daily' ? 'Weekly' : '' }}>Weekly</option>
                <option {{ $developermail->repeat_type == 'Daily' ? 'Monthly' : '' }}>Monthly</option>
                <option {{ $developermail->repeat_type == 'Daily' ? 'Quarterly' : '' }}>Quarterly</option>
                {{--<option {{ $developermail->repeat_type == 'Daily' ? 'By Annually' : '' }}>By Annually</option>--}}
                <option {{ $developermail->repeat_type == 'Daily' ? 'Annually' : '' }}>Annually</option>
                <option {{ $developermail->repeat_type == 'Daily' ? 'Custom' : '' }}>Custom</option>
            </select>
        </div>

        <div class="form-group" >
            <label>Repeat Days (loop range)</label>
            <input type="number" class="form-control" placeholder="Repeat Days" name="custom_duration" value="{{$developermail->custom_duration}}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="btn-group btn-toggle" data-toggle="buttons">
                <label class="{{$developermail->status ? 'btn btn-sm btn-primary active':'btn btn-sm btn-default'}}">
                    <input type="radio" id="option-0" name="status" value="1" {{$developermail->status ? 'checked="checked"':''}}>Active</label>
                <label class="{{!($developermail->status) ? 'btn btn-sm btn-primary active':'btn btn-sm btn-default'}}">
                    <input type="radio" id="option-1" name="status" value="0" {{!$developermail->status ? 'checked="checked"':''}}>Inactive</label>
            </div>
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>

<script>
    $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');

        if ($(this).find('.btn-primary').length>0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        if ($(this).find('.btn-danger').length>0) {
            $(this).find('.btn').toggleClass('btn-danger');
        }
        if ($(this).find('.btn-success').length>0) {
            $(this).find('.btn').toggleClass('btn-success');
        }
        if ($(this).find('.btn-info').length>0) {
            $(this).find('.btn').toggleClass('btn-info');
        }

        $(this).find('.btn').toggleClass('btn-default');

    });
</script>