<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Position</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('position.store')}}" method="post" onsubmit="event.preventDefault(); directSubmit(this);">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" placeholder="Description" name="description"/>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control" placeholder="Amount" name="amount">
        </div>


        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>