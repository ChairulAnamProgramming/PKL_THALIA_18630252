<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CurriculumVitae;
use App\Models\District;
use App\Models\Education;
use App\Models\EducationalBackground;
use App\Models\Population;
use App\Models\YellowCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        $data['districts'] = District::orderBy('name', 'ASC')->get();
        $data['educations'] = Education::orderBy('name', 'ASC')->get();
        $data['population'] = Population::where('user_id', Auth::user()->id)->first();
        if ($data['population']) {
            $data['curriculumVitae'] = CurriculumVitae::where('population_id', $data['population']->id)->first();
            $data['yellowcard'] = YellowCard::where('population_id', $data['population']->id)->first();
            $data['educationBackgrounds'] = EducationalBackground::where('population_id', $data['population']->id)->get();
        }

        return view('backend.pages.profile.index', $data);
    }
}
