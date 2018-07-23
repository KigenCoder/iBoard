<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentType;
use App\Http\Requests\DocumentsRequest;
use App\Meeting;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{




    public function __construct(){
        //Limit access to authenticated Organization Editors
        $this->middleware("organization_editor");


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($meeting_id){
        $data = array();
        $meeting = Meeting::findOrFail($meeting_id);
        $docs = Document::where("meeting_id", "=", $meeting->id)->get();
        $data['meeting'] = $meeting;
        $data['docs'] = $docs;
        return view('docs.index', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($meeting_id){
        $data = array();
        $data['doc_types'] = DocumentType::all();
        $data['meeting'] = Meeting::findOrFail($meeting_id);
        return view('docs.create', $data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentsRequest $request, $meeting_id){
        $input = $request->all();
        $file_name = $request->file('file')->getClientOriginalName();
        $timestamp = time();
        $file = $timestamp . '_' . $file_name;
        $destinationPath = "uploads";

        if (!empty($request)) {
            $request->file('file')->move($destinationPath, $file);
        }

        $data = array();
        $data['document_title'] = $input['document_title'];
        $data['document_path'] = "$destinationPath/$file";
        $data['document_type_id'] =$input['document_type_id'];
        $data['meeting_id'] = $meeting_id;
        Document::create($data);

        return redirect("meetings/$meeting_id/docs");
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
