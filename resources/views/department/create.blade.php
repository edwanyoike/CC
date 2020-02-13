@extends('adminlte::page')

@section('title', 'Create Department')

@section('content_header')
    <h1>Create a New Department</h1>
@stop




@section('content')
    <form method="POST" action="/department/store">
        @csrf

        <div class="row ">

            <div class="col-md-6 ">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Basic information</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">

                            <label for="department_name">Department Name</label>
                            <input type="text" name="name" id="department_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_church"> Parent Church</label>
                            <select name="parentChurch" id="parent_church"   class="form-control select2" style="width: 100%;">
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
            <div class="col-md-6  ">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Department Committee</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Vice Chair</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option disabled="disabled">California (disabled)</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Lay Leader</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option disabled="disabled">California (disabled)</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="inputSpentBudget">Total amount spent</label>
                            <input type="number" id="inputSpentBudget" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedDuration">Estimated project duration</label>
                            <input type="number" id="inputEstimatedDuration" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="col-12">
                    <input type="submit" value="Create Church" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </form>

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

        })
    </script>
@stop

