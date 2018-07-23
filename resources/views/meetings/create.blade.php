@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-header">ADD MEETING</h1>

            {!! Form::open(['url'=>'meetings']) !!}
            @csrf
            {{-- Display erros if any --}}
            @include('errors.list')
            <div class="form-group">
                <label for="role">MEETING TITLE</label>
                <input name="meeting_title" type="text" class="form-control" id="meeting_title" aria-describedby="meeting_title_help"
                       placeholder="Enter Meeting Title">
                <small id="meeting_title_help" class="form-text text-muted">Meeting Title
                </small>
            </div>

            <div class="form-group">
                <label for="role">MEETING START TIME</label>
                <input name="start_time" type="text" class="time form-control" id="start_time"
                       aria-describedby="startTimeHelp"
                       placeholder="mm/dd/yyyy HH::mm">
                <small id="startTimeHelp" class="form-text text-muted">Start Time
                </small>
                <script type="text/javascript">
                    $(function () {
                        $('#start_time').datetimepicker();
                    });
                </script>
            </div>

            <div class="form-group">
                <label for="role">MEETING END TIME</label>
                <input name="end_time" type="text" class="form-control" id="end_time" aria-describedby="endTimeHelp"
                       placeholder="mm/dd/yyyy HH::mm">
                <small id="endTimeHelp" class="form-text text-muted">End Time
                </small>
                <script type="text/javascript">
                    $(function () {
                        $('#end_time').datetimepicker();
                    });
                </script>
            </div>

            <div class="form-group">
                <label for="role">MEETING VENUE</label>
                <input name="venue" type="text" class="form-control" id="venue" aria-describedby="venue_help"
                       placeholder="Enter Meeting Venue">
                <small id="venue_help" class="form-text text-muted">Meeting Venue
                </small>
            </div>

            <div class="form-group">
                <label for="meeting_type_id">Meeting Type</label>
                <select name="meeting_type_id" class="form-control">
                    @foreach($meeting_types as $type)
                        <option value="{{$type->id}}">{!! $type->meeting_type !!}</option>
                    @endforeach
                </select>
                <small id="meetingTypeHelp" class="form-text text-muted">Meeting Type
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <script type="text/javascript">
        $('.timepicker').datetimepicker({
            format: 'dd/mm/yyyy HH:mm:ss'
        });
@endsection
