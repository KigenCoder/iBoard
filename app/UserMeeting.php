<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeeting extends Model
{

    protected $fillable = [
        'user_id',
        'meeting_id',
        'user_role_id',
        'did_attend'
    ];

    public function meeting(){
        return $this->belongsTo(Meeting::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function meetingRole(){
        return $this->belongsTo(MeetingRole::class);
    }
}
