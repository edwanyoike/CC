@extends('adminlte::page')

@section('title', 'All Churches')

@section('content_header')
    <h1>All Churches In The System</h1>
@stop
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>

                    <tr>
                        <th>Church</th>
                        <th>Congregants</th>
                        <th>last sunday total contributions</th>
                        <th>this month total contributions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($churches as $church)
                        <tr>
                            <td>{{$church->name}}</td>
                            <td>{{$church->isMotherChurch}}</td>
                            <td>{{24}}</td>
                            <td>{{24}}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

