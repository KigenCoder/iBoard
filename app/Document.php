<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model{
    //
    protected $fillable = [
        'document_title',
        'document_path',
        'document_type_id',
        'meeting_id'
    ];



    public  function document_type(){
        return $this->belongsTo(DocumentType::class);
    }

    public function meeting(){
        return $this->belongsTo(Meeting::class);
    }

}
