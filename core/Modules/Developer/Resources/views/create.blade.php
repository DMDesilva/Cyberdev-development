<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Developer</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('developer.store')}}" method="post" onsubmit="event.preventDefault(); directSubmitDeveloper(this);">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
        </div>

        <div class="form-group">
            <label>Position</label>
            <select class="form-control" name="position">
                @foreach($positions as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" class="form-control" placeholder="Ex:0123456789" name="mobile" id="mobile" onchange="checkForNumeric(this.value, 'mobile','span-mobile')">
            <span class="error"><p id="span-mobile"></p></span>
        </div>

        <div class="form-group">
            <label>Bitbucket_User</label>
            <select class="form-control" name="bitbucket_user">
                @foreach($positions as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>
        </div>







        <div class="form-group">
            <label>Home</label>
            <input type="text" class="form-control" placeholder="Ex:0123456789" name="home" id="home" onchange="checkForNumeric(this.value, 'home','span-home')">
            <span class="error"><p id="span-home"></p></span>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Address" name="address">
        </div>

        <div class="form-group">
            <label>Hourly rate</label>
            <input type="text" class="form-control" placeholder="Hourly rate" name="hourly_rate">
        </div>
         <div class="form-group">
            <label>Registered date</label>
            <input type="text" class="form-control" placeholder="Hourly rate" name="hourly_rate">
        </div>
        



        <div class="form-group">
            <label>Work Type</label>
            <select class="form-control" name="work_type">
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            {{--<input type="checkbox" data-toggle="switch" name="status" id="status" value="true" />--}}
            {{--<div class="btn-group btn-toggle">--}}
                {{--<button class="btn btn-xs btn-default">ON</button>--}}
                {{--<button class="btn btn-xs btn-primary active">OFF</button>--}}
            {{--</div>--}}
            <div class="btn-group btn-toggle" data-toggle="buttons">
                <label class="btn btn-sm btn-primary active">
                    <input type="radio" id="option-0" name="status" value="1" checked="checked">Active</label>
                <label class="btn btn-sm btn-default">
                    <input type="radio" id="option-1" name="status" value="0">Inactive</label>
            </div>
            {{--<label class="switch">--}}
                {{--<input type="checkbox" checked>--}}
                {{--<span class="slider round"></span>--}}
            {{--</label>--}}
        </div>
        <div class="form-group">
            <label>Working Days</label>
            &nbsp;
            <label>
                <input type="checkbox" onclick="toggle(this);"> Select All
            </label>
            <br>
            <table>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="1"> Monday</td>
                    <td>Start time <input type="time" name="starttime[1]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[1]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="2"> Tuesday</td>
                    <td>Start time <input type="time" name="starttime[2]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[2]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="3"> Wednesday</td>
                    <td>Start time <input type="time" name="starttime[3]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[3]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="4"> Thursday</td>
                    <td>Start time <input type="time" name="starttime[4]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[4]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="5"> Friday</td>
                    <td>Start time <input type="time" name="starttime[5]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[5]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="6"> Saturday</td>
                    <td>Start time <input type="time" name="starttime[6]" value="08:00"></td>
                    <td>End time <input type="time" name="endtime[6]" value="05:00"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="w_days[]" value="7"> Sunday</td>
                    <td>Start time <input type="time" name="starttime[7]" value="08:00"></td>
                    <td> End time <input type="time" name="endtime[7]" value="05:00"></td>
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