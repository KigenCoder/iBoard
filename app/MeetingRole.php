<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingRole extends Model{
    //
    protected $fillable =['user_meeting_role'];

    public function meeting(){

    return $this->hasMany(UserMeeting::class);
    }
}