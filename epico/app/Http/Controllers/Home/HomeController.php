<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EpicoApiModule;
use App\Models\UserProfileModel;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index() {
        $user = UserProfileModel::where([ "id" => Auth::user()->id ])->first();
        $user->notifications = 0;
        $user->save();

        $jobs = EpicoApiModule::GetJobs();
        $data = [ "jobs" => $jobs ];
        return View::make("home.index", $data);
    }

    public function news() {
        $news = EpicoApiModule::GetNews();

        $data = ["newsList" => $news];

        return View::make("home.news", $data);
    }
}
