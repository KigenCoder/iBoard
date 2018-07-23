@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href='{{url("org/$organization->id/users/create")}}' class="btn btn-success">ADD USER</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <h1 class="page-header">{!! $organization->organization !!} USERS</h1>
            <table class="table table-bordered table-striped">
                <th>User</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->names}}</td>
                        <td><a href="#" class="btn btn-primary">Edit</a></td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
