<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['jobVacancies'] = JobVacancy::orderBy('id', 'DESC')->get();
        return view('backend.pages.home.index', $data);
    }
}
