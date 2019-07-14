














<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Task</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('task.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">


        <div class="form-group">
            <label>Title</label>
            <input type="test" class="form-control" placeholder="Title" name="title" value="">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea rows="4" cols="50" class="form-control" placeholder="Description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Reported By</label>
            <input type="test" class="form-control" placeholder="<?php $vr = Auth::user()->name; echo $vr; ?>" name="reported_by" readonly="readonly">
        </div>
        <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type" id="type">
                @foreach($issues_types as $isu_type)
                <option value="{{$isu_type->id}}">{{$isu_type->name}}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="status">
                @foreach($issues_status as $isu_status)
                <option value="{{$isu_status->id}}">{{$isu_status->name}}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Resource_url</label>
            <input type="test" class="form-control" placeholder="Resource_url" name="Resource_url">
        </div>

        <div class="form-group">
            <label>Priority</label>
            <select class="form-control" name="priority" id="priority">
                @foreach($task_priorities as $isu_priority)
                <option value="{{$isu_priority->id}}">{{$isu_priority->name}}</option>

                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Deadline</label>
              <div style="display: flex;">
                <input type="date" class="form-control" style="width: 49%;" name="bday">
              <input type="time" class="form-control" style="width: 49%;" name="usr_time">
              </div>
              {{-- <input id="input" width="234" /> --}}
      </div>

        <div class="form-group">
            <label>Hours</label>
            <input type="test" class="form-control" placeholder="Hours" name="hours">
        </div>

        <div class="form-group">
            <label>Bitbucket Repositori</label>
            <select class="form-control" name="bitbucket_repo_id" id="bitbucket_repo_id">
                @foreach($bitbucket_repositories as $bitbucket_repos)
                <option value="{{$bitbucket_repos->id}}">{{$bitbucket_repos->name}}</option>

                @endforeach

            </select>
        </div>

        <!--  <div class="form-group">
                <label>Bitbucket Repocitor</label>
                <input type="test" class="form-control" placeholder="Bitbucket Reported Id" name="bitbucket_repo_id">
              </div>

  -->

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>


 