@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD USER ROLE</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'user_roles']) !!}
            @csrf
            <div class="form-group">
                <label for="role">USER ROLE</label>
                <input name="role" type="text" class="form-control" id="role" aria-describedby="roleHelp"
                       placeholder="Enter User Role">
                <small id="roleHelp" class="form-text text-muted">iBoard User Role
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
