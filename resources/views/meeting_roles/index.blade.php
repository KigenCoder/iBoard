@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href="{{url("meeting_roles/create")}}" class="btn btn-success">ADD MEETING ROLE</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <h1 class="page-header">MEETING ROLES DASHBOARD</h1>
            <table class="table table-bordered table-striped">
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach($meeting_roles as $role)
                    <tr>
                        <td>{{$role->user_meeting_role}}</td>
                        <td><a href="#" class="btn btn-primary">Edit</a> </td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
