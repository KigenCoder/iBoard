@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD ORGANIZATION</h1>
            {{-- Display erros if any --}}
            @include('errors.list')
            {!! Form::open(['url'=>'org']) !!}
                @csrf
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input name="organization" type="text" class="form-control" id="organization" aria-describedby="emailHelp"
                           placeholder="Enter Organization">
                    <small id="organizationHelp" class="form-text text-muted">iBoard Client Organization.
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
