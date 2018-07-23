<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingType extends Model{
    protected $fillable = [
        'meeting_type'
    ];

    protected function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
