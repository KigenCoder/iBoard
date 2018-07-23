<?php

namespace App;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract, JWTSubject
{

    use Authenticatable, CanResetPassword;


    protected $fillable = [
        'names',
        'email',
        'password',
        'organization_id',
        'user_role_id'

    ];

    public function organization()
    {
        $this->belongsTo(Organization::class);
    }

    public function role()
    {
        $this->belongsTo(UserRole::class);
    }

    public function isAdmin()
    {
        $user = Auth::user();

        //dd($user);

        if ($user->user_role_id == 1) {

            return true;
        }

        return false;
    }


    /*  Checks to see if user is has System admin rights
        System admins have visibility on all sectors of the System
    */


    public function isSystemAdmin()
    {
        $user = Auth::user();

        if ($user->user_role_id == 1) {

            return true;
        }
        return false;
    }

    /*  Checks to see if user is has admin rights for their organization
        Organization sys admins can add users for their organizations and basically do
         House keeping for their organizations.
     */
    public function isOrganizationAdmin()
    {
        $user = Auth::user();

        //System admin has visibility of what Org admin can see


        if ($user->user_role_id == 1 || $user->user_role_id == 2) {

            return true;
        }
        return false;

    }

    /*
     * Users who are Organization editors can CRUD meetings and documents related to them
     */

    public function isOrganizationEditor()
    {
        $user = Auth::user();

        //System admin has visibility of what Org admin can see
        $editors = [1, 2, 3];

        if ($user->user_role_id = 1 || $user->user_role_id == 2 || $user->user_role_id == 3) {

            return true;
        }
        return false;

    }

    public function getRoleIdAttribute($value)
    {
        return (int)$value;
    }

    /* Get the identifier that will be stored in the subject claim of the JWT. @return mixed */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /*Return a key value array, containing any custom claims to be added to the JWT.@return array*/
    public function getJWTCustomClaims()
    {
        return [];
    }


}
