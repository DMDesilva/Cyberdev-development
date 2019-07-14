       <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Task</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('task/update')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">
                {{ csrf_field() }}

                    <input type="hidden" class="form-control" placeholder="id" name="id" value="{{$task->id}}">
                <div class="form-group">
                    <label>Title</label>
                    <input type="test" class="form-control" placeholder="Title" name="title" value="{{$task->title}}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                <textarea rows="4" cols="50" class="form-control" placeholder="Description" name="description" value="">{{$task->content}}</textarea>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type">

                            @foreach($issues_types as $isu_type){
                                @if($isu_type->id==$task->type){
                                    <option selected value="{{$isu_type->id}}">{{$isu_type->name}}</option>
                                }
                                @else{
                                    <option value="{{$isu_type->id}}">{{$isu_type->name}}</option>
                                }
                                @endif
                            @endforeach

                        @foreach($issues_types as $isu_type)
                        <option value="{{$isu_type->id}}">{{$isu_type->name}}</option>
        
                        @endforeach
        
                    </select>
                </div>
        
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">

                            @foreach($issues_status as $isu_status){
                                @if($isu_status->id==$task->status){
                                    <option selected value="{{$isu_status->id}}">{{$isu_status->name}}</option>
                                }
                                @else{
                                    <option value="{{$isu_status->id}}">{{$isu_status->name}}</option>
                                }
                                @endif
                            @endforeach
        
                    </select>
                </div>
        
                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" name="priority" id="priority">
                            @foreach($task_priorities as $isu_priority){
                                @if($isu_priority->id==$task->priority){
                                    <option selected value="{{$isu_priority->id}}">{{$isu_priority->name}}</option>
                                }
                                @else{
                                    <option value="{{$isu_priority->id}}">{{$isu_priority->name}}</option>
                                }
                                @endif
                            @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label>Deadline</label>
                      <div style="display: flex;">
                        <input type="date" class="form-control" style="width: 49%;" name="bday" value="<?php $str = $task->deadline; $last=explode(" ",$str); echo $last[0]; ?>">
                      <input type="time" class="form-control" style="width: 49%;" name="usr_time" value="<?php $str = $task->deadline; $last=explode(" ",$str); echo $last[1]; ?>">
                      </div>
                      {{-- <input id="input" width="234" /> --}}
              </div>
        
                <div class="form-group">
                    <label>Hours</label>
                <input type="test" class="form-control" placeholder="Hours" name="hours" value="{{$task->hours}}">
                </div>
        


              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            
          </div>                    


          
          


              

            