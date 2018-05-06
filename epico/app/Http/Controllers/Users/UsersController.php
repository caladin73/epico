<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Middleware\LoginModule;
use App\Models\ContactModel;
use App\Models\UserProfileModel;
use App\Models\UserTypeModel;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    public function index() {
        $user = Auth::user();
        $types = UserTypeModel::where([ "user_id" => $user->id ])->get();
        $contact = ContactModel::where([ "profile_id" => $user->id ])->get();

        $data = [
            "user" => $user,
            "types" => $types,
            "contact" => $contact
        ];

        return View::make("users.index", $data);
    }

    public function edit() {
        $user = Auth::user();
        $types = UserTypeModel::where([ "user_id" => $user->id ])->get();
        $contact = ContactModel::where([ "profile_id" => $user->id ])->first();

        $data = [
            "user" => $user,
            "types" => $types,
            "contact" => $contact
        ];

        return View::make("users.edit", $data);
    }

    public function editHandle(Request $request) {
        $user = UserProfileModel::where([ "id" => Auth::user()->id ])->first();

        $user->name = $request->input("name");

        $user->save();


        $contact = ContactModel::where([ "profile_id" => $user->id])->first();

        if ($contact == null) {
            $contact = new ContactModel();
            $contact->profile_id=$user->id;
        }

        $contact->street = $request->input("street");
        $contact->city = $request->input("city");
        $contact->country = $request->input("country");
        $contact->zip_code = $request->input("zip_code");

        $contact->save();

        return redirect()->route("user_profile");
    }

    public function password() {
        return View::make("users.password");
    }

    public function passwordHandle(Request $request) {
        if ($request->input("password") == $request->input("passwordCheck")) {
            $user = UserProfileModel::where([ "id" => Auth::user()->id ])->first();

            LoginModule::setPassword( $user, $request->input("password") );

            return redirect()->route("user_profile");
        }

        $data = [ "error" => "passwords do not match" ];

        return View::make("users.password", $data);
    }
}
