@extends('adminlte::page')

@section('title', 'Create Church')
@section('plugins.daterangepicker', true)


@section('content_header')
    <h5>Create a New Member form</h5>
@stop

@section('content')

    @if (sizeof($departments)>0)

        <form method="POST" action="/member/store">
            @csrf

            <div class="row ">

                <div class="col-md-6  align-content-centerI">
                    <div class="card card-primary card-blue">
                        <div class="card-header">
                            <h3 class="card-title">Event information</h3>
                            <div> {{$errors->first('error_message')}}</div>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            @include('churchevent.create')



                                <div class="form-group">
                                    <label for="member_departments">Organizing Department(s)</label>
                                    <div> {{$errors->first('departments')}}</div>
                                    <select class="department-multiple-select col-md-7" id="member_departments"
                                            name="departments[]" multiple="multiple">

                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>

                                        @endforeach
                                    </select>

                                </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </form>

    @else
        <h5> You need create a department to add an event to first
        </h5>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $('.department-multiple-select').select2();


        })
    </script>
@stop

