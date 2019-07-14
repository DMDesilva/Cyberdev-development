<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Edit Permision</h4>
</div>
<div class="modal-body">
    <form action="{{url('/permisionmanagement/update')}}"  method="post">
        {{ csrf_field() }}
        {{method_field('put')}}
        <input type="hidden" id="id" value="{{$add_payment->id}}" class="form-control" name="id" >

        <div class="form-group">
            <label>Name</label>
             <input type="text"  class="form-control" required placeholder="Full Name" name="full_name" value="{{$add_payment->name}}">
        </div>

        <div class="form-group">
            <label>Description</label>
          <textarea rows="4" cols="50" class="form-control" placeholder="Discription" name="discription" id="discription">{{$add_payment->discription}}</textarea>

        </div>

       

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>