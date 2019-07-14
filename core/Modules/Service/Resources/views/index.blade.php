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
      Service Management
      <small>All Services in the system</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Service List</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Service</button>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Service Type</th>
              <th>Due Percentage</th>
              <th>Description</th>
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
<script type="text/javascript">
  let resource = 'service';
</script>
<script src="{{asset('assets/js/crud.js')}}"></script>
<script src="{{asset('assets/js/service.js')}}"></script>
@endpush