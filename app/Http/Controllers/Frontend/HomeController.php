<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['jobVacancies'] = JobVacancy::orderBy('id', 'DESC')->get();
        $data['companies'] = Company::orderBy('name', 'ASC')->get();
        return view('frontend.pages.home.index', $data);
    }
}
