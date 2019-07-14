<script>$(document).ready(function() {
        $('#multiselect').select2();
    });
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Add Project</h4>
</div>
<div class="modal-body">
    <form class="ajax-submit" action="{{route('project.store')}}" method="post" onsubmit="event.preventDefault(); directSubmitProject(this);">

        <div class="form-group">
            <label>Project Name</label>
            <input type="text" class="form-control" placeholder="Project Name" name="name">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" placeholder="Description" name="description"/>
        </div>

        <div class="form-group">
            <label>Domain</label>
            <input type="text" class="form-control" placeholder="Domain" name="domain">
        </div>

        <div class="form-group">
            <label>Approved Date</label>
            <input type="date" class="form-control" placeholder="Approved Date" name="approved_date" id="approved_date" onblur="validateDates();">
        </div>

        <div class="form-group">
            <label>Development Start Date</label>
            <input type="date" class="form-control" placeholder="Development Start Date" name="dev_start_date" id="dev_start_date" onblur="validateDates();">
        </div>
        <div class="form-group">
            <label>Clients</label>
            <select class="form-control" id="multiselect" multiple="multiple" name="clients[]" data-placeholder="Select clients" style="width: 100%;">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control" placeholder="Amount" name="amount">
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


</div>