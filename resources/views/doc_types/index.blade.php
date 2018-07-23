@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-10">
        <a href="{{url("doc_types/create")}}" class="btn btn-success">ADD DOCUMENT TYPE</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <h1 class="page-header">DOC TYPES DASHBOARD</h1>
            <table class="table table-bordered table-striped">
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach($doc_types as $type)
                    <tr>
                        <td>{{$type->document_type}}</td>
                        <td><a href="#" class="btn btn-primary">Edit</a> </td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
