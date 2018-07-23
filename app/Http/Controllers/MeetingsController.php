<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingsRequest;
use App\Library\Common;
use App\Meeting;
use App\MeetingRole;
use App\MeetingType;
use App\Organization;
use App\User;
use App\UserMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Log\NullLogger;

class MeetingsController extends Controller
{
    public function __construct()
    {
        //Limit access to authenticated Organization Editors
        $this->middleware("organization_editor");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();

        $user_id = Auth::user()->id;

        //Organization Editors
        $user = User::findOrFail($user_id);


        if ($user->user_role_id == 1) {

            $data['meetings'] = Meeting::all();

        } else {

            $organization = Organization::findOrFail($user->organization_id);
            $data["organization"] = $organization;

            $meetings = Common::organizationMeetings($organization->id);

            $data['meetings'] = $meetings;


        }


        return view('meetings.index', $data);

    }


    public function organization_meetings(){

    }

    protected function getMarkets($organization_id = NULL)
    {
        $meetings = NULL;
        if (is_null($organization_id)) {

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['meeting_types'] = MeetingType::all();
        return view('meetings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingsRequest $request)
    {
        $data = array();
        $data['meeting_title'] = $request->all()['meeting_title'];
        $data['start_time'] = Carbon::createFromTimeString($request->all()['start_time']);
        $data['end_time'] = Carbon::createFromTimeString(($request->all()['end_time']));
        $data['venue'] = $request->all()['venue'];
        $data['meeting_type_id'] = $request->all()['meeting_type_id'];

        $meeting_id = Meeting::create($data)->id;

        //User Meeting Role ID
        $user_role_id = MeetingRole::where('user_meeting_role', '=', 'creator')->get()[0]->id;

        $user = Auth::user();

        //Insert into User Meetings
        $user_meeting_data = array();
        $user_meeting_data['user_id'] = $user->id; //Change when auth works
        $user_meeting_data["meeting_id"] = $meeting_id;
        $user_meeting_data['user_role_id'] = $user_role_id;

        UserMeeting::create($user_meeting_data);

        return redirect('meetings');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('meetings.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
