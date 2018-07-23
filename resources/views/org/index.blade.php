@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href="{{url("org/create")}}" class="btn btn-success">ADD ORGANIZATION</a>
    </div>
    <div class="row">
    <div class="table-responsive">
        <h1 class="page-header">Organizations Dashboard</h1>
        <table class="table table-bordered table-striped">
            <th>Organization</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Users</th>

           @foreach($organizations as $org)
            <tr>
                <td>{{$org->organization}}</td>
                <td><a href="#" class="btn btn-primary">Edit</a> </td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
                <td><a href='{!! url("org/$org->id/users")!!}' class="btn btn-success">Users</a></td>
            </tr>
            @endforeach
        </table>

    </div>
    </div>
@endsection
