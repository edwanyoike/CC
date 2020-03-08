@extends('adminlte::page')

@section('title', 'Church Event')
@section('plugins.daterangepicker', true)
@section('custom-file-input', true)



@section('content_header')
    <h5>Create a New Event Form</h5>
@stop

@section('content')

    @if (count($churches)>0)

        <form method="POST" action="/event/church" enctype="multipart/form-data" >
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
                                <label for="organizing_department">Organizing Church(s)</label>
                                <div> {{$errors->first('departments')}}</div>
                                <select class="church-multiple-select  col-md-7" id="organizing_church"
                                        name="churches[]" multiple="multiple">

                                    @foreach($churches as $church)
                                        <option value="{{$church->id}}">{{$church->name}}</option>
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

                                <input type="file" name="eventPoster" id="event_poster">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>



            <div class="col-12">
                <input type="submit" value="Create Event" class="btn btn-success ">
            </div>


        </form>

    @else
        <h5> You need create a Church to add an event to.
        </h5>
    @endif

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

            $('.church-multiple-select').select2();


        });

        $('#event_date').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            "timePicker24Hour": true,
            locale: {
                format: 'Y/M/DD hh:mm '
            }
        });

        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop

