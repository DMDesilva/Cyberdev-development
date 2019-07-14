@extends('layouts.master')

@push('script')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/ladda/css/ladda-themeless.min.css')}}">
<!-- Date time -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Task Management
      <small>All Task in the system</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Task List</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Task</button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Type</th>
              <th>Priority</th>
              <th>Deadline</th>
              <th>Hours</th>
              <th>Status</th>
            <!--   <th>Bitbucket Repocitor</th> -->
              <th>Action</th> 
            </tr>
          </thead>
        </table>
     
          
    <!-- /.box -->

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Salary</th>
                <th>Salary</th>
                <th>Salary</th>
            </tr>
        </thead>
    </table>

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
<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css')}}">

<script type="text/javascript">
  let resource = 'task';
</script>
<script src="{{asset('assets/js/crud.js')}}"></script>


<script>

var SSPEnable=true;
 var opt= {
     responsive: true,
     processing: true,
     serverSide: true,
     ajax: {
         url:'task/data',
         type:'POST',
         dataType: 'JSON',
         beforeSend: function (xhr) {
             xhr.setRequestHeader('Authorization');
         }
     }
     ,
      columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},       
        {data: 'title' , name: 'title', orderable: true, searchable : true},
        {data: 'type' , name: 'type', orderable: true, searchable : true},
        {data: 'priority' , name: 'priority', orderable: true, searchable : true},
        {data: 'deadline' , name: 'deadline', orderable: true, searchable : true},
        {data: 'status' , name: 'status', orderable: true, searchable : true},
        {data: 'bitbucket_repo_id' , name: 'bitbucket_repo_id', orderable: true, searchable : true},       
        {data: 'action' , name: 'action', orderable: false, searchable : false},
        ]
      }
 
 function successHandler(form, data) {
     returnMessage('success', data.msg);
 }
 
 $(function () {
     datatabel=$('.dataTable').DataTable(opt)
 }
 
 );
 function addClick(e) {
     loadModal(resource);
 }
 function editclick3(e){
  loadModal(resource, $(e).attr('data-id'));
 }
 
 function editClick(e) {
     loadModal(resource, $(e).attr('data-id'));
 }
 
 function deleteClick(e) {
     var delete_confirm=confirm("Please confirm delete");
     if(delete_confirm) {
         deleteRow(resource + '/'+ $(e).attr('data-id'));
     }
 }
 function assignClick(e){
    loadModal_assign(resource,$(e).attr('data-id'));
 }
 
 function loadModal(resource, id=0) {
     var url='';
     if(id==0) {
         url=resource+"/create";
     }
     else {
         url=resource+"/"+id+"/edit";
     }
     $.ajax( {
         url: url,
          method: "get", 
          data: {
             id: id
         },
          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
             setModelContent(data);
         },
          error: function(data) {
    }
      });
    }

    function loadModal_assign(resource, id=0) {
     var url=resource+"/assign";

     $.ajax( {
         url: url,
          method: "POST", 
          data: {
             id: id
         },
          beforeSend: function () {

          },
          complete: function () {

          },
          success: function (data) {
             setModelContent(data);
         },
          error: function(data) {
    }
      });
    }
 
 function setModelContent(data) {
     $('#formModal .modal-content').html(data);
     $('#formModal').modal('show');
 }
 
 function successHandler(form, data) {
     $('#formModal').modal('hide');
     datatabel.draw();
 }

</script>

<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": '/cyber/test'
    } );
  } );
</script>
 


@endpush