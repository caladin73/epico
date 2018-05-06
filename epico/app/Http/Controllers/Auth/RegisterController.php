<?php

namespace App\Http\Controllers\Auth;

use App\Http\Middleware\LoginModule;
use App\Models\UserProfileModel;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\View;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function register() {
        if (Auth::user() != null) {
            return redirect()->route("home");
        }

        return view('auth.register');
    }

    public function handleRegister(Request $request) {
        //$this->validate()

        // This part (checking if email address exists) should be in validate function
        if (UserProfileModel::where([ "email" => $request->input("email") ])->first() == null) {
            $userModel = new UserProfileModel();
            $userModel->email = $request->input("email");

            LoginModule::setPassword($userModel, $request->input("password"));

            return redirect()->route("login");
        } else {
            // TODO: This email address already exists
            die("email already taken");
        }
    }
}
