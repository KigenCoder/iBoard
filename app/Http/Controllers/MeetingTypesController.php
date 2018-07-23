<?php

namespace App\Http\Controllers;

use App\MeetingType;
use Illuminate\Http\Request;
use App\Http\Requests\MeetingTypeRequest;
class MeetingTypesController extends Controller
{
    public function __construct(){
        //Limit access to authenticated System Admins
        $this->middleware("system_admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
        $data = array();
        $data['meeting_types'] = MeetingType::all();
        return view('meeting_types/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('meeting_types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingTypeRequest $request){
        $data = array();
        $data['meeting_type'] = $request->all()['meeting_type'];
        MeetingType::create($data);
        return redirect('meeting_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
