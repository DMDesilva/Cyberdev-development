@extends('layouts.master')

@push('script')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ladda/css/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ladda/css/ladda-themeless.min.css')}}">

    


@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Permision Management
                <small>All permision in the system</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">User List</h3>

              <div class="box-tools pull-right">
                  <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add User</button>
                </div>
              </div>
                <div class="box-body">
                  <table id="viewtable" class="able table-bordered table-striped dataTable" style="width:100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Discription</th>
                              <th>Create By</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                  </table>
              </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('includes.form-modal')

@endsection

@push('script')

    <!-- DataTables -->
    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/ladda/js/spin.min.js')}}"></script>
    <script src="{{asset('assets/ladda/js/ladda.min.js')}}"></script>
    <script type="text/javascript">
        let resource = 'permisionmanagement';
    </script>
    <script src="{{asset('assets/js/crud.js')}}"></script>
    <script>
    	var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'permisionmanagement/data',
        type:'POST',
        dataType: 'JSON',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization');
        }
    },
    columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},
        // {data: 'id' , name: 'id', orderable: true},
        {data: 'name' , name: 'name', orderable: true, searchable : true},
        {data: 'discription' , name: 'discription', orderable: true, searchable : true},
        {data: 'created_by' , name: 'created_by', orderable: true, searchable : true},
        {data: 'action' , name: 'action', orderable: false, searchable : false},
    ]
}
$(function () {

//datatabel = $('#viewtable').DataTable( {
//        "ajax": '/2'


//end 
});

function addClick(e){
    loadModal(resource);
}
function editclick3(e){
  loadModal(resource, $(e).attr('data-id'));
 }
function editClick(e){
    loadModal(resource,$(e).attr('data-id'));
}

function deleteClick(e){
    var delete_confirm = confirm("Please confirm delete");
    if(delete_confirm){
        deleteRow(resource + '/'+ $(e).attr('data-id'));
    }
}

function loadModal(resource,id = 0){
    var url = '';
    if(id == 0){
        url = resource+"/create";
    }else{
        url = resource+"/"+id+"/edit";
    }

    $.ajax({
        url: url,
        method: "get",
        data: {
            id:id
        },
        beforeSend: function () {

        },
        complete: function () {
        },
        success: function (data) {
            setModelContent(data);
        },
        error: function(data){

        }
    });
}

function setModelContent(data){
    $('#formModal .modal-content').html(data);
    $('#formModal').modal('show');
}

function successHandler(form,data){
    $('#formModal').modal('hide');
    datatabel.draw();
}
    </script>
    <script>
  $(document).ready(function() {
    $('#viewtable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('/permisionmanagement/tableview2')}}",
        "columns":[
            { "data": "DT_RowIndex" },
            { "data": "name" },
            { "data": "discription" },
            { "data": "roles.name" },
            { "data": "action" },
        ]
     });
  } );

</script>
@endpush