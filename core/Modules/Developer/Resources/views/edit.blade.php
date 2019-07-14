<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Developer</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('developer.update',['id'=>$developer->id])}}" method="post" onsubmit="event.preventDefault(); directSubmitDeveloper(this);">
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{$developer->firstname}}">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{$developer->lastname}}">
        </div>

        <div class="form-group">
            <label>Position</label>
            <select class="form-control" name="position">
                @foreach($positions as $position)
                    <option value="{{$position->id}}" {{$developer->position == $position->id ? 'selected':''}}>{{$position->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" class="form-control" placeholder="Ex:0123456789" id="mobile" name="mobile" value="{{$developer->mobile}}" onchange="checkForNumeric(this.value, 'mobile','span-mobile')">
            <span class="error"><p id="span-mobile"></p></span>
        </div>

        <div class="form-group">
            <label>Home</label>
            <input type="text" class="form-control" placeholder="Ex:0123456789" id="home" name="home" value="{{$developer->home}}" onchange="checkForNumeric(this.value, 'home','span-home')">
            <span class="error"><p id="span-home"></p></span>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$developer->email}}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Address" name="address" value="{{$developer->address}}">
        </div>

        <div class="form-group">
            <label>Status</label>
            {{--<input type="checkbox" data-toggle="button" name="status" id="status" value="{{$developer->status}}"/>--}}
            <div class="btn-group btn-toggle" data-toggle="buttons">
                <label class="{{$developer->status ? 'btn btn-sm btn-primary active':'btn btn-sm btn-default'}}">
                    <input type="radio" id="option-0" name="status" value="1" {{$developer->status ? 'checked="checked"':''}}>Active</label>
                <label class="{{!($developer->status) ? 'btn btn-sm btn-primary active':'btn btn-sm btn-default'}}">
                    <input type="radio" id="option-1" name="status" value="0" {{!$developer->status ? 'checked="checked"':''}}>Inactive</label>
            </div>

            {{--<label class="bs-switch">--}}
                {{--<input type="checkbox" {{$developer->status ? 'checked="checked"':''}}>--}}
                {{--<span class="slider round"></span>--}}
            {{--</label>--}}
        </div>


        <div class="form-group">
            <label>Work Type</label>
            <select class="form-control" name="work_type">
                <option value="Full-time" {{$developer->work_type == 'Full-time' ? 'selected':''}}>Full-time</option>
                <option value="Part-time" {{$developer->work_type == 'Part-time' ? 'selected':''}}>Part-time</option>
            </select>
        </div>

        <div class="form-group">
            <label>Working Days</label>
            <label>
                <input type="checkbox" onclick="toggle(this);" {{ sizeof($workingdays) == 7 ? 'checked':''}}> Select All
            </label>
            <table>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="1" {{ in_array(1, $workingdays) ? 'checked':''}}> Monday</td>
                    <td>Start time <input type="time" name="starttime[1]" value="{{array_key_exists(1,$starttimes) ? $starttimes[1] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[1]" value="{{array_key_exists(1,$endtimes) ? $endtimes[1] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="2" {{ in_array(2, $workingdays) ? 'checked':''}}> Tuesday</td>
                    <td>Start time <input type="time" name="starttime[2]" value="{{array_key_exists(2,$starttimes) ? $starttimes[2] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[2]" value="{{array_key_exists(2,$endtimes) ? $endtimes[2] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="3" {{ in_array(3, $workingdays) ? 'checked':''}}> Wednesday</td>
                    <td>Start time <input type="time" name="starttime[3]" value="{{array_key_exists(3,$starttimes) ? $starttimes[3] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[3]" value="{{array_key_exists(3,$endtimes) ? $endtimes[3] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="4" {{ in_array(4, $workingdays) ? 'checked':''}}> Thursday</td>
                    <td>Start time <input type="time" name="starttime[4]" value="{{array_key_exists(4,$starttimes) ? $starttimes[4] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[4]" value="{{array_key_exists(4,$endtimes) ? $endtimes[4] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="5" {{ in_array(5, $workingdays) ? 'checked':''}}> Friday</td>
                    <td>Start time <input type="time" name="starttime[5]" value="{{array_key_exists(5,$starttimes) ? $starttimes[5] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[5]" value="{{array_key_exists(5,$endtimes) ? $endtimes[5] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="6" {{ in_array(6, $workingdays) ? 'checked':''}}> Saturday</td>
                    <td>Start time <input type="time" name="starttime[6]" value="{{array_key_exists(6,$starttimes) ? $starttimes[6] : '08:00'}}"></td>
                    <td>End time <input type="time" name="endtime[6]" value="{{array_key_exists(6,$endtimes) ? $endtimes[6] : '05:00'}}"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="7" {{ in_array(7, $workingdays) ? 'checked':''}}> Sunday</td>
                    <td>Start time <input type="time" name="starttime[7]" value="{{array_key_exists(7,$starttimes) ? $starttimes[7] : '08:00'}}"></td>
                    <td> End time <input type="time" name="endtime[7]" value="{{array_key_exists(7,$endtimes) ? $endtimes[7] : '05:00'}}"></td>
                </tr>
            </table>
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