@extends('adminlte::page')

@section('title', 'All Members')

@section('content_header')
    <h1>Church Members</h1>

@section('plugins.Datatables', true)

@stop
@section('content')

    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="First Name: activate to sort column descending"
                                style="width: 170px;">First Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Second Name: activate to sort column ascending" style="width: 220px;">Second Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Church: activate to sort column ascending" style="width: 194px;">
                               Church
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Phone Number: activate to sort column ascending" style="width: 144px;">
                               Phone Number
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" style="width: 144px;">
                               Actions
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($members as $member)

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$member->firstName}}</td>
                                <td>{{$member->secondName}}</td>
                                <td>{{$member->memberable->name}}</td>
                                <td>{{$member->address->phoneNumber}}</td>
                                <td class=" text-right">
                                    <a class="btn btn-primary btn-sm" href="{{$member->id}}" title="more details">
                                        <i class="fas fa-folder">
                                        </i>

                                    </a>
                                    <a class="btn btn-info btn-sm" href="" title="edit church details">
                                        <i class="fas fa-pencil-alt">
                                        </i>


                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" title="delete">
                                        <i class="fas fa-trash">
                                        </i>

                                    </a>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">First Name</th>
                            <th rowspan="1" colspan="1">Second Name</th>
                            <th rowspan="1" colspan="1">Church</th>
                            <th rowspan="1" colspan="1">Phone Number</th>
                            <th rowspan="1" colspan="1">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script>


        $(function () {
            $("#example1").DataTable(
                {
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,

                }
            );

        });


    </script>
@stop
