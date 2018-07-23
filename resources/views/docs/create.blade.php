@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-1">
        <div class="col-sm-9">
            <h2 class="page-header">{!!$meeting->meeting_title!!} - Add Doc</h2>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>"meetings/$meeting->id/docs", 'files'=>true]) !!}
            @csrf
            <div class="form-group">
                <label for="document_title">Document Title</label>
                <input name="document_title" type="text" class="form-control" id="document_title"
                       aria-describedby="namesHelp"
                       placeholder="Enter Doc Title">
                <small id="namesHelp" class="form-text text-muted">Doc Title.
                </small>
            </div>

            <div class="form-group">
                <label for="file">Doc Upload</label>
                <input name="file" type="file" class="form-control" id="file"
                       aria-describedby="fileHelp"
                       placeholder="Upload Doc">
                <small id="fileHelp" class="form-text text-muted">Document upload.
                </small>
            </div>

            <div class="form-group">
                <label for="document_type_id">Document Type</label>
                <select name="document_type_id" class="form-control">
                    @foreach($doc_types as $type)
                        <option value="{{$type->id}}">{!!$type->document_type!!}</option>
                    @endforeach
                </select>
                <small id="document_type_id_help" class="form-text text-muted">Doc Type
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
