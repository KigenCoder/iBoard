@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD MEETING TYPE</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'meeting_types']) !!}
            @csrf
            <div class="form-group">
                <label for="role">MEETING TYPE</label>
                <input name="meeting_type" type="text" class="form-control" id="meeting_type" aria-describedby="roleHelp"
                       placeholder="Enter Meeting Type">
                <small id="roleHelp" class="form-text text-muted">Meeting Type
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
