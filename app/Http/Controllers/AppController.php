<?php

namespace App\Http\Controllers;

use App\Document;
use App\Library\Common;
use App\Organization;
use App\User;
use Illuminate\Http\Request;

class AppController extends Controller{

    public function __construct()
    {

        //$this->middleware('jwt.auth');

    }


    public function organizationMeetings(Request $request)
    {

        $input = $request->all();
        $organization_id = $input["organization_id"];

        $saved_meeting_ids = isset($input["saved_meeting_ids"]) ? $input["saved_meeting_ids"] : null;

        $meetings = Common::organizationMeetings($organization_id, $saved_meeting_ids);


        return response()->json(
            array(["meetings" => $meetings])
        );
    }


    public function documents(Request $request)
    {
        $input = $request->all();

        $meeting_id = $input["meeting_id"];

        $saved_doc_ids = isset($input["saved_doc_ids"]) ? $input["saved_doc_ids"] : null;

        $documents = Document::where("meeting_id", "=", $meeting_id)
            ->when($saved_doc_ids, function ($query) use ($saved_doc_ids) {
                return $query->whereNotIn('documents.id', $saved_doc_ids);
            })
            ->join('document_types', 'document_types.id', '=', 'documents.document_type_id')
            ->get(["documents.*", "document_types.document_type"]);


        return response()->json(array(["documents" => $documents]));


    }


}
