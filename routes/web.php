<?php

use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\CurriculumVitaeController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\EducationalBackgroundController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\JobApplicationController;
use App\Http\Controllers\Backend\JobSeekerController;
use App\Http\Controllers\Backend\JobVacancyController;
use App\Http\Controllers\Backend\PopulationController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\WorkTrainingController;
use App\Http\Controllers\Backend\YellowCardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/vacancy/{uuid}', [JobVacancyController::class, 'show'])->name('vacancy.detail');
    // BIODATA
    Route::get('/biodata', [ProfileController::class, 'index'])->name('biodata.index');
    Route::resource('/curriculumVitae', CurriculumVitaeController::class);
    Route::resource('/yellow-card', YellowCardController::class);
    Route::resource('/educational-background', EducationalBackgroundController::class);
    Route::post('/autoComplite', [PopulationController::class, 'autoComplite'])->name('population.autoComplite');
    // MENUS
    Route::resource('/district', DistrictController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/population', PopulationController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/work_training', WorkTrainingController::class);
    Route::resource('/job_vacancy', JobVacancyController::class);
    Route::resource('/job_application', JobApplicationController::class);
    Route::resource('/job_seeker', JobSeekerController::class);

    // REPORT
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::patch('/reports/{type}/job_seeker', [ReportController::class, 'jobseeker'])->name('reports.jobseeker');
    Route::patch('/reports/{type}/jobvacancy', [ReportController::class, 'jobvacancy'])->name('reports.jobvacancy');
});
