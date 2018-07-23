@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href="{{url("meetings/$meeting->id/docs/create")}}" class="btn btn-success">ADD DOCUMENT</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <h2 class="page-header">{!! $meeting->meeting_title . ":" !!} Documents</h2>
            <table class="table table-bordered table-striped">
                <th>Document</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach($docs as $doc)
                    <tr>
                        <td><a href="{{url("$doc->document_path")}}">{{$doc->document_title}}</a></td>
                        <td><a href="#" class="btn btn-primary">Edit</a> </td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
