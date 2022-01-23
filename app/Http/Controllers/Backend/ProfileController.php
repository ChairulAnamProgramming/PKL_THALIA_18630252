<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Education;
use App\Models\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        $data['districts'] = District::orderBy('name', 'ASC')->get();
        $data['population'] = Population::where('user_id', Auth::user()->id)->first();
        return view('backend.pages.profile.index', $data);
    }
}
