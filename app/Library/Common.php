<?php
/**
 * Created by PhpStorm.
 * User: Kigen
 * Date: 20/06/2018
 * Time: 10:08
 */

namespace App\Library;

use App\Meeting;


class Common
{


    public static function organizationMeetings($organization_id, $saved_meeting_ids = null){
        $meetings = Meeting::where("organizations.id", "=", $organization_id)
            ->when($saved_meeting_ids, function ($query) use ($saved_meeting_ids) {
                return $query->whereNotIn('meetings.id', $saved_meeting_ids);
            })
            ->join('user_meetings', 'user_meetings.meeting_id', "=", 'meetings.id')
            ->join('users', 'users.id', '=', 'user_meetings.user_id')
            ->join('organizations', 'organizations.id', '=', 'users.organization_id')
            ->join('meeting_types', 'meeting_types.id', '=', 'meetings.meeting_type_id')
            ->get([
                "organizations.organization",
                "meetings.id",
                "meetings.meeting_title",
                "meetings.start_time",
                "meetings.end_time",
                "meetings.venue",
                "meeting_types.meeting_type"
            ]);

        return $meetings;

    }

}