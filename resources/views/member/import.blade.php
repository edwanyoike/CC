@extends('adminlte::page')

@section('title', 'import members')

@section('content_header')
    <h5>Import Members From an Excel Sheet</h5>
@stop

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Import Form
            </div>
            <div class="card-body">
                <form action="/member/import" method="POST" name="importform"
                      enctype="multipart/form-data">
                    @csrf



                 select excel file: <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import File</button>
                </form>
            </div>
        </div>
    </div>

@stop
