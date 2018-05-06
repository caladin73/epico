<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\LoginModule;
use App\Models\UserProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;

class LoginController extends Controller
{
    // LinkedIn login
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function loginLinkedin() {
        try {
            $user = Socialite::driver("linkedin")->user();

            $userModel = UserProfileModel::where([
                "email" => $user->email,
                "linkedin_id" => $user->id
            ])->first();

            if ($userModel == null) {
                $userModel = new UserProfileModel();

                $userModel->name = $user->name;
                $userModel->email = $user->email;
                $userModel->linkedin_id = $user->id;

                $userModel->save();
            }

            Auth::login($userModel);
            return redirect()->route('home');

        } catch (Exception $e) {
            return redirect('auth/linkedin');
        }
    }


    // Regular login
    public function login() {
        if (Auth::user() != null) {
            return redirect()->route("home");
        }

        return View::make("auth.login");
    }

    public function handleLogin(Request $request) {
        //$this->validate()

        if (LoginModule::authenticate($request->input("email"), $request->input("password")) != null) {
            return redirect()->route("home");
        } else {
            return redirect()->route("login");
        }
    }


    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
