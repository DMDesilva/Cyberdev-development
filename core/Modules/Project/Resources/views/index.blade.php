@extends('layouts.master')

@push('script')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ladda/css/ladda-themeless.min.css')}}">
    <!--Select2-->
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
    <!--Data-toggle-->
    <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap-toggle/css/bootstrap-toggle.min.css')}}">

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Projects Management
                <small>All projects in the system</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Projects List</h3>

                    <div class="box-tools pull-right">
{{--                        <button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add--}}
{{--                            Project--}}
{{--                        </button>--}}
                        <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal"
                                data-target="#createProject">Create
                            Project
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Clients</th>
                            <th>Domain</th>
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
{{--    @include('includes.form-modal')--}}
    <div class="container">
        <div class="modal fade" id="createProject" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Repository Create</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">

                                <div class="form-group">
                                    <label> Project Code :</label>
                                    <input type="text" class="form-control" name="project_code"
                                           placeholder="Enter Project Code Here">
                                    @if ($errors->has('project_code'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('project_code')}}</strong></span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>VCR Service :</label>
                                    <select class="form-control" name="vcr_service_type">
                                        <option value="">Select Service</option>
                                        @foreach($vcr_services as $vcr_service)
                                            <option value="{{$vcr_service->id}}">{{$vcr_service->type}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('vcr_service_type'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('vcr_service_type')}}</strong></span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label> Name :</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Enter Project Name Here">
                                    @if ($errors->has('name'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('name')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Description :</label>
                                    <input type="text" class="form-control" name="description"
                                           placeholder="Enter Repository Description Here">
                                    @if ($errors->has('description'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('description')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Repositories:</label><br>
                                    <select class="repositories form-control" name="repositories[]" multiple="multiple" required>
                                        <option value="">Select Repository / Repositories</option>
                                        @foreach($repositories as $repository)
                                        <option value="{{$repository->id}}">{{$repository->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('repositories'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('repositories')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Domain</label>
                                    <input type="text" class="form-control" placeholder="Domain" name="domain">
                                    @if ($errors->has('domain'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('domain')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Approved Date</label>
                                    <input type="date" class="form-control" placeholder="Approved Date" name="approved_date" id="approved_date" onblur="validateDates();">
                                    @if ($errors->has('approved_date'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('approved_date')}}</strong></span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>Development Start Date</label>
                                    <input type="date" class="form-control" placeholder="Development Start Date" name="dev_start_date" id="dev_start_date" onblur="validateDates();">
                                    @if ($errors->has('dev_start_date'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('dev_start_date')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Project Deadline Date</label>
                                    <input type="date" class="form-control" placeholder="Development Deadline Date" name="project_deadline_date" id="project_deadline_date" onblur="validateDates();">
                                    @if ($errors->has('project_deadline_date'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('project_deadline_date')}}</strong></span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Man Hours Count</label>
                                    <input type="number" class="form-control" placeholder="Man Hours Count" name="man_hour_count">
                                    @if ($errors->has('man_hour_count'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('man_hour_count')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Clients</label>
                                    <select class="clients form-control" id="multiselect" multiple="multiple" name="clients[]" data-placeholder="Select clients" style="width: 100%;">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('clients'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('clients')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Developers</label>
                                    <select class="developers form-control" id="multiselect" multiple="multiple" name="developers[]" data-placeholder="Select Sevelopers" style="width: 100%;">
                                        @foreach($developers as $developer)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('developers'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('developers')}}</strong></span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-left">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"
            type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('.repositories,.clients,.developers').select2({
                width: '100%'
                }
            );
        });

        $(document).ready(function () {
            $('.create-btn').click(function () {
                var id = $(this).attr('data-id');
                var url = $(this).attr('data-url');
                var update_url = $(this).attr('data-update-url');

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {},
                    success: function (data) {

                        $('.edit-name').val(data['name']);
                        $('#edit-description').val(data['description']);
                        $('#edit-language').val(data['language']);

                        if(data['is_private'] == 0){
                            $('#edit-public').prop('selected', true);
                        } else {
                            $('#edit-private').prop('selected', true);
                        }

                        $('#update-form').attr('action',update_url);
                    },
                    error: function (reject) {
                        console.log(reject);
                    }
                });
            });
        });
    </script>




@endsection

@push('script')

    <!-- DataTables -->
{{--    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!--toggle-->
    <script src="{{asset('assets/bower_components/bootstrap-toggle/js/bootstrap-toggle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/ladda/js/spin.min.js')}}"></script>
    <script src="{{asset('assets/ladda/js/ladda.min.js')}}"></script>
    <script type="text/javascript">
        let resource = 'project';
        let dateValidation = false;

    </script>
    <script src="{{asset('assets/js/crud.js')}}"></script>
    <script src="{{asset('assets/js/project.js')}}"></script>
@endpush