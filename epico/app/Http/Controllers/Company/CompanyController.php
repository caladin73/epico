<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{
    public function index($id) {
        $company = Company::find($id);


        return View::make();
    }
}
