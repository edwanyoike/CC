@extends('adminlte::page')

@section('title', 'Create Church')
@section('plugins.daterangepicker', true)
@section('custom-file-input', true)



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
                                    <label for="organizing_department">Organizing Department(s)</label>
                                    <div> {{$errors->first('departments')}}</div>
                                    <select class="department-multiple-select  col-md-7" id="organizing_department"
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


                <div class="col-md-6 align-content-center">
                    <div class="card card-secondary card-blue">
                        <div class="card-header">
                            <h3 class="card-title">Event Poster</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="form-group col-6">

                            <label for="eventPoster">Event Poster</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="eventPoster" id="event_poster">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>


                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>



                <div class="col-12">
                    <input type="submit" value="Create Event    " class="btn btn-success ">
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


        });

        $('#event_date').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            "timePicker24Hour": true,
            locale: {
                format: 'Y/M/DD hh:mm '
            }
        })

        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop

