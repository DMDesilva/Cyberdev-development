

           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Deadline</h4>
          </div>
          <div class="modal-body">
            <form class="ajax-submit" action="{{route('deadline.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

              <div class="form-group">
                <label>Task_Id</label>
                <input type="text" class="form-control" placeholder="Task_Id" name="task_id">
              </div>

              <div class="form-group">
                <label>Task_Url</label>
                <input type="text" class="form-control" placeholder="Task_Url" name="task_url">
              </div><a href="{{ url('https://www.google.lk/') }}">Some Text</a>

              <div class="form-group">
                <label>Assign_Hourse</label>
                <input type="text" class="form-control" placeholder="Assign_Hourse" name="assign_hourse">
              </div>

              
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>            
          </div>