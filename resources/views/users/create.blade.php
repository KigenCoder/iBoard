@extends('layouts.dashboard')

@section('content')
    <div class="row col-md-offset-1">
        <div class="col-sm-9">
            <h1 class="page-header">{!!$organization->organization!!} - ADD USER</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>"org/$organization->id/users"]) !!}
            @csrf
            <div class="form-group">
                <label for="names">User names</label>
                <input name="names" type="text" class="form-control" id="names" aria-describedby="namesHelp"
                       placeholder="Enter user name">
                <small id="namesHelp" class="form-text text-muted">User Names.
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                </small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                <small id="passwordHelp" class="form-text text-muted">Enter Password.
                </small>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                       placeholder="Password Confirmation">
                <small id="password_confirmation_help" class="form-text text-muted">Confirm password
                </small>
            </div>
            <div class="form-group">
                <label for="user_role_id">User Role</label>
                <select name="user_role_id" class="form-control">
                    @foreach($user_roles as $role)
                        <option value="{{$role->id}}">{!! $role->role !!}</option>
                    @endforeach
                </select>
                <small id="user_role_id_help" class="form-text text-muted">User Role
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
