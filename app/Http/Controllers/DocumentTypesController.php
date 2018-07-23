<?php

namespace App\Http\Controllers;

use App\DocumentType;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentTypeRequest;
class DocumentTypesController extends Controller
{
    public function __construct(){
        //Limit access to authenticated Organization Editors
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
        $data['doc_types'] = DocumentType::all();
        return view('doc_types/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc_types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentTypeRequest $request){
        $data = array();
        $data['document_type'] = $request->all()['document_type'];
        DocumentType::create($data);
        return redirect('doc_types');
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
