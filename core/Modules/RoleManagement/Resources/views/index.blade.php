@extends('layouts.master')

@push('script')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ladda/css/ladda-themeless.min.css')}}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles Management
                <small>All Roles in the system</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Role List</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Roles</button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="viewtable2" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Permition</th>
                            <th>Created By</th>
                            <th>Actions</th>
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
     <script src="{{asset('assets/js/crud.js')}}"></script>
    <script type="text/javascript">
        let resource = 'rolemanagement';
    </script>
    <script>
    	var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'rolemanagement/data',
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
        {data: 'permition' , name: 'permition', orderable: true, searchable : true},
       
        {data: 'action' , name: 'action', orderable: false, searchable : false},
    ]
}
$(function () {

  //  datatabel = $('.dataTable').DataTable(opt)



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
    $('#viewtable2').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('/tableview')}}",
        "columns":[
            { "data": "DT_RowIndex" },
            { "data": "name" },
            { "data": "permition" },
            { "data": "roles.name" },
            { "data": "action" },
        ]
     });
  } );

</script>
@endpush