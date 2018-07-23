@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href="{{url("meetings/create")}}" class="btn btn-success">ADD MEETING</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <h2 class="page-header">
                @if(isset($organization))
                    {!! $organization->organization . ": - " !!}
                @endif
                MEETINGS DASHBOARD
            </h2>
            <table class="table table-bordered table-striped">
                <th>Meetings</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach($meetings as $meeting)
                    <tr>
                        <td>
                            <a href="{{url("meetings/$meeting->id/docs")}}">{{$meeting->meeting_title}}</a>
                            <small id="startTimeHelp" class="form-text text-muted"> Docs:
                            </small>
                        </td>
                        <td><a href="#" class="btn btn-primary">Edit</a> </td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
