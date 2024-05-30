@extends('layouts.app')

@section('content')
            <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Sample table page
                    </div>

                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Lastname</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Update and Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->firstname}}</td>
                                        <td>{{$item->middlename}}</td>
                                        <td>{{$item->lastname}}</td>
                                        <td>{{$item->age}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{url('employees/'.$item->id.'/edit')}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
    
                                            <a class="btn btn-danger btn-sm" href="{{url('employees/'.$item->id.'/delete')}}">
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

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection