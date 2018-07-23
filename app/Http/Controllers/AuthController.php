<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    //Show Login form
    public function showLogin(){
        return view('auth.login');
    }


     //Login Users
    public function doLogin(LoginRequest $request){

        $input = $request->all();

        $email = $input["email"];

        $password = $input["password"];


        try{
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                // Authentication passed...
                $user = Auth::user();

                switch ($user->user_role_id){
                    case 1:
                        //System Admin
                        return redirect('org');
                        break;
                    case 2:
                        //Organization Admin
                        return redirect('meetings');
                        break;
                    case 3:
                        //Organization Editor
                        return redirect('meetings');
                        break;
                    default:
                        return redirect('/');
                        break;
                }

            }else{
                return redirect('/');
            }

        }catch (\Exception $exception){
            //dd($exception);
        }

    }

    //Logout
    public function logout(Request $request){
        Auth::logout(); // log the user out of our application
        return Redirect('login'); // redirect the user to the login screen
    }


    /*
     * Login & Logout from the iOS & Android mobile apps
     */
    public function app_login(LoginRequest $request){
        $credentials = $request->only('email', 'password');


        try{

            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {

                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }else{
                  //User authenticated

                $user = JWTAuth::user();


                return response()->json(['success' => true, 'user'=>$user], 200);
            }

        }catch (JWTException $exception){

            //dd($exception);

        }



    }






    public function app_logout(Request $request){

        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
                'status' => 'success',
                'msg' => 'You have successfully logged out.'
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'status' => 'error',
                'msg' => 'Failed to logout, please try again.'
            ]);
        }

    }


    public function app_refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }




}
