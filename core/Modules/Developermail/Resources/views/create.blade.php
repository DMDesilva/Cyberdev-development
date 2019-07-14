<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Developer Mail</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('developermail.store')}}" method="post" onsubmit="event.preventDefault(); directSubmitDevMail(this);">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>

        <div class="form-group">
            <label>Mail Type</label>
            <select class="form-control" style="width: 100%" name="mailtype">
                @foreach($mailtypes as $mailtype)
                    <option value="{{$mailtype->id}}">{{$mailtype->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Developer Group</label>
            <select class="form-control"  multiple="multiple" style="width: 100%" id="devgroups" name="devgroups[]">
                @foreach($developergroups as $developergroup)
                    <option value="{{$developergroup->id}}">{{$developergroup->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Developers</label>
            <select class="form-control"  multiple="multiple" style="width: 100%" id="developers" name="developers[]">
                @foreach($developers as $developer)
                    <option value="{{$developer->id}}">{{$developer->firstname}} {{$developer->lastname}}</option>
                @endforeach
            </select>
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
                <option>Quarterly</option>
                {{--<option>By Annually</option>--}}
                <option>Annually</option>
                <option>Custom</option>
            </select>
        </div>

        <div class="form-group" >
            <label>Repeat Days (loop range)</label>
            <input type="number" class="form-control" placeholder="Repeat Days" name="custom_duration">
        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="btn-group btn-toggle" data-toggle="buttons">
                <label class="btn btn-sm btn-primary active">
                    <input type="radio" id="option-0" name="status" value="1" checked="checked">Active</label>
                <label class="btn btn-sm btn-default">
                    <input type="radio" id="option-1" name="status" value="0">Inactive</label>
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