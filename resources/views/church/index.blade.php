@extends('adminlte::page')

@section('title', 'All Churches')

@section('content_header')
    <h1>All Churches In The System</h1>
@stop
@section('content')


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Church
                        </th>
                        <th style="width: 30%">
                            mama church
                        </th>
                        <th>
                            congregants
                        </th>
                        <th style="width: 8%" class="text-center">
                            last sunday contributions
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($churches as $church)



                        <tr>
                            <td>
                                #
                            </td>

                            <td>
                                <a>
                                    {{$church->name}}</a>
                                <br>
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
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{$church->id}}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

