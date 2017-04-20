<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(){

        if(Auth::attempt(['email'=>$email,'password'=>$password])){

        }
    }

    protected function redirectTo(){

        $role = new Role();

        if($role->getRoleByAuthenticatedUser( Auth::user()) === 'admin') {

            return '/admin';
        }

        if($role->getRoleByAuthenticatedUser( Auth::user())=== "teacher") {

            return '/teacher/home';
        }

        if($role->getRoleByAuthenticatedUser( Auth::user()) === "student") {

            return '/student/home';
        }
    }
}
