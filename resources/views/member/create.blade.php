@extends('adminlte::page')

@section('title', 'Create Church')

@section('content_header')
    <h1>Create a New Member</h1>
@stop

@section('content')

    @if (sizeof($churches)>0)

    <form method="POST" action="/member/store">
        @csrf

        <div class="row ">

            <div class="col-md-6  ">
                <div class="card card-primary card-blue">
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

                            <label for="first_name">First Name</label>
                            <div> {{$errors->first('firstName')}}</div>
                            <input type="text" name="firstName" id="first_name" value="{{old('firstName')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="second_name">Second Name</label>
                            <div> {{$errors->first('secondName')}}</div>
                            <input type="text" name="secondName" id="second_name" value="{{old('secondName')}}" class="form-control">
                        </div>

                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>  <div> {{$errors->first('gender')}}</div>

                                <select name="gender" id="gender"  class="form-control">
                                    <option value="MALE">Male</option>
                                    <option value="MALE">Female</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="member_church">Member Church</label>
                            <select name="memberChurch" id="member_church"   class="form-control select2" style="width: 100%;">
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
            <div class="col-md-6 " >
                <div class="card card-secondary card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Member Address</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('address.create')

                   </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="col-12">
                    <input type="submit" value="Create Member" class="btn btn-success float-right">
                </div>
            </div>
        </div>

    </form>

    @else
        <h5> a church member can not be created if there exist no church record in the system <br>
            Create a church in the system first.
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

        })
    </script>
@stop

