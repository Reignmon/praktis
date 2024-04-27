@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <a href="{{ url('employees/show') }}" class="nav-link">
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
                
        <div class="contaier-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-4">


                    @if (session('status'))
                        <div class="alert alert-success">{{session('session_status')}}</div>
                    @endif

                    <form action="{{url('employees')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" value="{{old('firstname')}}" >
                            @error('firstname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" name="middlename" class="form-control" placeholder="Enter Middlename" value="{{old('middlename')}}" >
                            @error('middlename') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" value="{{old('lastname')}}" >
                            @error('lastname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" placeholder="Enter Age" value="{{old('age')}}" >
                            @error('age') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Enter Gender" value="{{old('gender')}}" >
                            @error('gender') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="card">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    <!-- /.content -->
@endsection