<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model{

    protected $dates = ['start_time', 'end_time'];

    protected $fillable = [
        'meeting_title',
        'start_time',
        'end_time',
        'venue',
        'meeting_type_id'

    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meeting_type(){
        return$this->belongsTo(MeetingType::class);
    }


    public function invitees(){
        return $this->hasMany(UserMeeting::class);
    }
}
