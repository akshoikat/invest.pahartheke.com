<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\InvestmentPlanController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FactSheetController;
use App\Http\Controllers\Backend\TractionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\SettingsController;




Route::get("/", [HomeController::class, "home"])->name("home");




Auth::routes();

Route::group(['prefix'=> 'admin'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('settings/', [DashboardController::class, 'edit'])->name('setting')->middleware('auth');;
    Route::put('settings/', [DashboardController::class, 'update'])->name('setting.update')->middleware('auth');;


     
    Route::get('/banner/edit', [SettingsController::class, 'edit'])->name('admin.banner.edit');
    Route::put('/banner/update', [SettingsController::class, 'update'])->name('admin.investment-highlight.update');


    // routes/web.php


     
    Route::get('investment-plans', [InvestmentPlanController::class, 'index'])->name('investment-plans.index');
    Route::post('investment-plans', [InvestmentPlanController::class, 'store'])->name('investment-plans.store');
    Route::put('investment-plans/{investment_plan}', [InvestmentPlanController::class, 'update'])->name('investment-plans.update');
    Route::delete('investment-plans/{investment_plan}', [InvestmentPlanController::class, 'destroy'])->name('investment-plans.destroy');


   // List all FAQs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    Route::get('/fact-sheets', [FactSheetController::class, 'index'])->name('fact-sheets.index');
    Route::post('/fact-sheets', [FactSheetController::class, 'store'])->name('fact-sheets.store');
    Route::put('/fact-sheets/{factSheet}', [FactSheetController::class, 'update'])->name('fact-sheets.update');
    Route::delete('/fact-sheets/{factSheet}', [FactSheetController::class, 'destroy'])->name('fact-sheets.destroy');


    Route::get('/traction', [TractionController::class, 'index'])->name('traction.index');
    Route::post('/traction', [TractionController::class, 'store'])->name('traction.store');
    Route::put('/traction/{traction}', [TractionController::class, 'update'])->name('traction.update');
    Route::delete('/traction/{traction}', [TractionController::class, 'destroy'])->name('traction.destroy');


});
