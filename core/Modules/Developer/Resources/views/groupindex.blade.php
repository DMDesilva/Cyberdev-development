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
                Developer Groups Management
                <small>All developer groups registered in the system</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Developer Groups List</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Developer Group</button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Developers</th>
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
        let resource = 'developergroup';
       // let numberValidation = false;
    </script>
    <script src="{{asset('assets/js/crud.js')}}"></script>
    <script src="{{asset('assets/js/developergroup.js')}}"></script>
    <script>


    </script>


@endpush