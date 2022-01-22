<?php

use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\EducationController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\JobVacancyController;
use App\Http\Controllers\Backend\PopulationController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\WorkTrainingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/vacancy/{uuid}', [JobVacancyController::class, 'show'])->name('vacancy.detail');
    Route::get('/biodata', [ProfileController::class, 'index'])->name('biodata.index');
    // MENUS
    Route::resource('/district', DistrictController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/population', PopulationController::class);
    Route::resource('/company', CompanyController::class);
    Route::resource('/work_training', WorkTrainingController::class);
    Route::resource('/job_vacancy', JobVacancyController::class);
    // REPORT
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});
