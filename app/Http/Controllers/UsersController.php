<?php

namespace App\Http\Controllers;
use App\UserRole;
use App\User;
use App\Http\Requests\UserRequest;
use App\Organization;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct(){
        //Limit access to authenticated Organization Admins
        $this->middleware("organization_admin");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($orgnaization_id){
        $data = array();
        $data["organization"] = Organization::where('id', $orgnaization_id)->firstOrFail();
        $data["users"] = User::where("organization_id", $orgnaization_id)->get();
        return view('users.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * org/{org}/users/create
     */
    public function create($organization_id){
        $data = array();
        $data["user_roles"] = UserRole::all();
        $data['organization'] = Organization::where("id", $organization_id)->firstOrFail();

        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($organaization_id, UserRequest $request){
        $data = array();
        $input = $request->all();
        $data["names"] = $input["names"];
        $data["email"] = $input["email"];
        $data["password"] = bcrypt($input['password']);
        $data['organization_id'] = $organaization_id;
        $data['user_role_id'] = $input['role_id'];
        User::create($data);
        return redirect("org/$organaization_id/users");
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
