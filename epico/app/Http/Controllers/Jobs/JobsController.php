<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EpicoApiModule;
use App\Models\JobModel;
use Illuminate\Support\Facades\View;

class JobsController extends Controller
{
    public function job($id) {
        $jobs = EpicoApiModule::GetJobs();
        $job = null;

        foreach($jobs as $item) {
            if($item->guid == $id) {
                $job = $item;
                break;
            }
        }

        $contact = null;
        $contacts = EpicoApiModule::GetContacts();

        foreach($contacts as $item) {
            if ($item->email == $job->email) {
                $contact = $item;
            }
        }

        $data = [
            "job" => $job,
            "contact" => $contact,
            ];

        return View::make("jobs.index", $data);
    }
}
