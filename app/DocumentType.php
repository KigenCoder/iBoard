<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model{
    protected $fillable = [
        'document_type'
    ];

    public function documents(){
        return $this->hasMany(Document::class);
    }

}
