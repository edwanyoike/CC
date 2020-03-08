@extends('adminlte::page')

@section('title', 'Church Events')

@section('content_header')
    <h1>All Church Events</h1>

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
                                aria-sort="ascending" aria-label="event Name: activate to sort column descending"
                                style="width: 170px;">Event Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="start at: activate to sort column ascending" style="width: 220px;">Event
                                start at
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Ends at: activate to sort column ascending" style="width: 220px;">Event
                                ends at
                            </th>


                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="venue: activate to sort column ascending" style="width: 194px;">
                                Venue
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Organizing Departments: activate to sort column ascending" style="width: 144px;">
                                Organizing Church(s)
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Budget: activate to sort column ascending" style="width: 144px;">
                                Allocated Budget
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Phone Number: activate to sort column ascending" style="width: 144px;">
                                Kitty's Balance
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" style="width: 144px;">
                                Actions
                            </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($events as $event)

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$event->name}}</td>
                                <td>{{$event->event_start_date}}</td>
                                <td>{{$event->event_end_date}}</td>

                                <td>{{$event->venue}}</td>

                                <td>{{$event->eventable->name}}</td>

                                <td>{{$event->budget}}</td>


                                {{--                                <td>{{$kityyBalance}}</td>--}}
                                <td>{{15000}}</td>

                                <td class=" text-right">
                                    <a class="btn btn-primary btn-sm" href="{{$event->id}}" title="more details">
                                        <i class="fas fa-folder">
                                        </i>

                                    </a>
                                    <a class="btn btn-info btn-sm" href="" title="edit event details">
                                        <i class="fas fa-pencil-alt">
                                        </i>


                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" title="delete event">
                                        <i class="fas fa-trash">
                                        </i>

                                    </a>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Event Name</th>
                            <th rowspan="1" colspan="1">Event start at</th>
                            <th rowspan="1" colspan="1">Event ends at</th>
                            <th rowspan="1" colspan="1">Venue</th>
                            <th rowspan="1" colspan="1">Organizing church(s)</th>
                            <th rowspan="1" colspan="1">Allocated Budget</th>
                            <th rowspan="1" colspan="1">Kitty's Balance</th>
                            <th rowspan="1" colspan="1">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


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

