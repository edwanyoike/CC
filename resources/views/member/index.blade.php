@extends('adminlte::page')

@section('title', 'All Members')

@section('content_header')
    <h1>Church Members</h1>
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

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($members as $member)

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$member->firstName}}</td>
                                <td>{{$member->secondName}}</td>
                                <td>{{$member->memberable->name}}</td>
                                <td>{{$member->address->phoneNumber}}</td>
                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">First Name</th>
                            <th rowspan="1" colspan="1">Second Name</th>
                            <th rowspan="1" colspan="1">Church</th>
                            <th rowspan="1" colspan="1">Phone Number</th>
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
                    select: true

                }
            );

        });



    </script>
@stop
