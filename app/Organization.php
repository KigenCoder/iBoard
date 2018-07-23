<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model{

    protected $fillable = [
        'organization'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
