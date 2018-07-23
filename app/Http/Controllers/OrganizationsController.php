<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Http\Requests\OrganizaionsRequest;
use Namshi\JOSE\JWT;
use Tymon\JWTAuth\JWTAuth;

class OrganizationsController extends Controller
{
    public function __construct(){
        $this->middleware('system_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //List all organizations

        $organizations = Organization::all();
        $data = array();
        $data["organizations"] = $organizations;
        return view('org.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //Add organization
        return view('org.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizaionsRequest $request){
         $input = $request->all();
         $data = [
             "organization"=>$input["organization"]
         ];

         Organization::create($data);

         return redirect('org');

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
