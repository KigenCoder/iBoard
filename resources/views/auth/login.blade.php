@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1 class="page-header">LOGIN</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'login']) !!}
            @csrf
            <div class="form-group">
                <label for="role">Email</label>
                <input name="email" type="text" class="form-control" id="email" aria-describedby="email_help"
                       placeholder="Enter user email">
                <small id="email_help" class="form-text text-muted">Email
                </small>
            </div>

            <div class="form-group">
                <label for="role">Password</label>
                <input name="password" type="password" class="form-control" id="password"
                       aria-describedby="password_help"
                       placeholder="User password">
                <small id="password_help" class="form-text text-muted">Password
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection



