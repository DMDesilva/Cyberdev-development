<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Role</h4>
</div>
<div class="modal-body">
    <form action="{{url('/rolemanagement/store')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Name</label>
             <input type="text" class="form-control" required placeholder="Full Name" name="full_name">
        </div>

        
        <div class="form-group">
            <label>Permitions</label>
            <select class="form-control"  multiple="multiple" style="width: 100%" name="permition[]">
                     @foreach($rol as $rol)
                       <option value="{{$rol->id}}">{{$rol->name}}</option>
                     @endforeach  
            </select>
          </div>

       

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>