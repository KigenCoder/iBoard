@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD DOCUMENT TYPE</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'doc_types']) !!}
            @csrf
            <div class="form-group">
                <label for="role">DOCUMENT TYPE</label>
                <input name="document_type" type="text" class="form-control" id="document_type" aria-describedby="documentTypeHelp"
                       placeholder="Enter Document Type">
                <small id="roleHelp" class="form-text text-muted">Document Type
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
