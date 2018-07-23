@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-11">
            <a href="{{url("user_roles/create")}}" class="btn btn-success">ADD ROLE</a>
    </div>
    <div class="row">
    <div class="table-responsive">
        <h1 class="page-header">User Roles Dashboard</h1>
        <table class="table table-bordered table-striped">
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>

            @foreach($user_roles as $role)
                <tr>
                    <td>{{$role->role}}</td>
                    <td><a href="#" class="btn btn-primary">Edit</a> </td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    </div>
@endsection
