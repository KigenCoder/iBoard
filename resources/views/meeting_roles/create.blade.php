@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD USER MEETING ROLE</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'meeting_roles']) !!}
            @csrf
            <div class="form-group">
                <label for="role">MEETING USER ROLE</label>
                <input name="user_meeting_role" type="text" class="form-control" id="user_meeting_role" aria-describedby="roleHelp"
                       placeholder="Enter Meeting User Role">
                <small id="roleHelp" class="form-text text-muted">Meeting User Role
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
