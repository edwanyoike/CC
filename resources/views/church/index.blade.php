@extends('adminlte::page')

@section('title', 'All Churches')

@section('content_header')
    <h1>All Churches In The System</h1>
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
                                aria-sort="ascending" aria-label="code : activate to sort column descending"
                                style="width: 170px;">#
                            </th>


                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-sort="ascending" aria-label="First Name: activate to sort column descending"
                                style="width: 170px;">Church
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Second Name: activate to sort column ascending" style="width: 220px;">
                                departments
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Congregants: activate to sort column ascending" style="width: 194px;">
                                Congregants
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Phone Number: activate to sort column ascending" style="width: 144px;">
                                upcoming events
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Phone Number: activate to sort column ascending" style="width: 144px;">
                                Actions
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($churches as $church)

                            <tr>

                                <td>
                                    {{$church->code}}
                                </td>

                                <td>
                                    <a>{{$church->name}}</a>

                                </td>
                                <td>
                                    {{$church->isMotherChurch}}
                                </td>
                                <td class="project_progress">
                                    {{56}}
                                </td>
                                <td class="project-state">
                                    {{12300}}
                                </td>
                                <td class=" text-right">
                                    <a class="btn btn-primary btn-sm" href="{{$church->id}}" title="more details">
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
                            <th rowspan="1" colspan="1">#</th>
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

                }
            );

        });


    </script>
@stop

