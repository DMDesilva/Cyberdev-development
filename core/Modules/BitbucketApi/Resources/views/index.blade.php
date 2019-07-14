@extends('layouts.master')

@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            View Repository
            <small>All Repository registered in the system</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Repository List</h3>

                <div class="box-tools pull-right">
                    {{--<button type="button" class="btn btn-block btn-primary btn-sm" onclick="addClick()">Add Developer</button>--}}
                    {{--<a href="{{route('repository.create')}}" class="btn btn-block btn-primary btn-sm">Create Repository</a>--}}

                    <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal"
                            data-target="#createRepository">Create
                        Repository
                    </button>

                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($repositories as $repository)
                        <tr>
                            <td>{{$repository->id}}</td>
                            <td>{{$repository->name}}</td>
                            <td>{{$repository->is_private == 1 ? 'Private' : 'Public'}}</td>
                            <td>
                                {{--<a href="{{route('repository.edit',['id'=>$repository->id])}}">Edit Repository</a>--}}

                                <div style="display: inline">
                                    <button type="button" data-id="{{$repository->id}}"
                                            class="edit-btn btn btn-default btn-sm"
                                            data-toggle="modal"
                                            data-url="{{route('repository.edit',['id'=>$repository->id])}}"
                                            data-update-url="{{route('repository.update',['id'=>$repository->id])}}"
                                            data-target="#editRepository"> Edit
                                    </button>
                                    <form class="deleteForm"
                                          action="{{route('repository.destroy',['id'=>$repository->id])}}" method="POST"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('Delete')
                                        {{----}}
                                        <input type="submit" class="btn btn-default btn-sm" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    {{--repository create--}}
    <div class="container">
        <div class="modal fade" id="createRepository" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <form action="{{route('repository.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Repository Create</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label> Name :</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Enter Repository Name Here">

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
                                    <label>Language : </label>
                                    <input type="text" class="form-control" name="language"
                                           placeholder="Enter Repository Language Here">
                                    @if ($errors->has('language'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('language')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Privilege :</label>
                                    <select class="form-control" name="is_private">
                                        <option value="">Select Privilege</option>
                                        <option value="0">Public</option>
                                        <option value="1">Private</option>
                                    </select>
                                    @if ($errors->has('is_private'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('is_private')}}</strong></span>
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

    {{--repository edit--}}
    <div class="container">
        <div class="modal fade" id="editRepository" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    {{--<form action="{{route('repository.update',['id'=>$repository->id])}}" method="POST" enctype="multipart/form-data">--}}
                    <form id="update-form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Repository Edit</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label> Name :</label>
                                    <input type="text" class="form-control edit-name" disabled>
                                    <input type="hidden" class="form-control edit-name" name="name">

                                    @if ($errors->has('name'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('name')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Description :</label>
                                    <input id="edit-description" type="text" class="form-control" name="description"
                                           placeholder="Enter Repository Description Here">
                                    @if ($errors->has('description'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('description')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Language : </label>
                                    <input id="edit-language" type="text" class="form-control" name="language"
                                           placeholder="Enter Repository Language Here">
                                    @if ($errors->has('language'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('language')}}</strong></span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Privilege :</label>
                                    <select class="form-control" name="is_private">
                                        <option value="">Select Privilege</option>
                                        <option id="edit-public" value="0">Public</option>
                                        <option id="edit-private" value="1">Private</option>
                                    </select>
                                    @if ($errors->has('is_private'))
                                        <span class="alert-danger"
                                              role="alert"><strong>{{ $errors->first('is_private')}}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-left">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        $('.deleteForm').on('submit', function (e) {
            e.preventDefault();
            var r = confirm("Doy You Want Delete ??? ");
            if (r == true) {
                this.submit();
            }
        });

        $('.edit-btn').click(function () {
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

<!-- /.content-wrapper -->
@include('includes.form-modal')

@endsection

