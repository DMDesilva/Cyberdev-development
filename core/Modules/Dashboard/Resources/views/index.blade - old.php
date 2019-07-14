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
      Client Management
      <small>All clients task in the system</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content col-md-12">

    <!-- Default box -->
    <div class="box col-md-12">
      <div class="box-header with-border col-md-12">
        <h3 class="box-title">Task List</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Task</button>
        </div>
      </div>
      <div class="box-body col-md-12">
        <table class="table table-bordered table-striped dataTable col-12 col-md-6">
          <thead>
            <tr>
               <th>type</th>
               <th>time</th>
               <th>Difference</th>
            </tr>
          </thead>
          <tr>
                    @foreach ($data as $dt)
                    @if($dt->type==1)
                    <td>Start</td>
                    @elseif($dt->type==2)
                    <td>Pause</td>

                    @elseif($dt->type==3)
                    <td>Continue</td>

                    @elseif($dt->type==4)
                    <td>End</td>

                    @endif
                    <td>{{$dt->created_at}}</td>
                    <td>{{$dt->time_difference}}</td>
                </tr>
                @endforeach
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
  let resource = 'task';
</script>
<!-- <script src="{{asset('assets/js/crud.js')}}"></script>
<script src="{{asset('assets/js/task.js')}}"></script> -->
@endpush