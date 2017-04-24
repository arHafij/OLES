<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'user_type' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $role = new Role();

        if( $role->getRoleBySlug( $data['user_type'] ) == 'student' ) {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'role_id' => $role->getRoleIdBySlug( $data['user_type'] ),
                'password' => bcrypt($data['password'])
            ]);
        }

        if( $role->getRoleBySlug( $data['user_type'] ) == 'teacher' ) {
            return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'role_id' => $role->getRoleIdBySlug( $data['user_type'] ),
                'degree' => $data['degree'],
                'password' => bcrypt($data['password'])
            ]);
        }

    }

    protected function redirectTo(){

        $role = new Role();

        if($role->getRoleByAuthenticatedUser( Auth::user()) === 'admin') {

            return '/admin';
        }

        if($role->getRoleByAuthenticatedUser( Auth::user()) === "teacher") {

            return '/teacher/home';
        }

        if($role->getRoleByAuthenticatedUser( Auth::user()) === "student") {

            return '/student/home';
        }
    }
}
