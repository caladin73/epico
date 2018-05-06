<?php

namespace App\Http\Controllers\Notifications;

use App\Company;
use App\Http\Controllers\Controller;
use App\Models\UserProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NotificationsController extends Controller
{
    public function get()
    {
        $id = Auth::user()->id;
        return UserProfileModel::where([ "id" => $id ])->first()->notifications;
    }

    public function addNew() {
        DB::statement("UPDATE user_profile SET notifications = notifications + 1;");
        return redirect()->route("user_profile");
    }
}
