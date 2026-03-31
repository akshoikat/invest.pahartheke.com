<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Traction;
use App\Models\FactSheet;
use App\Models\InvestmentPlan;
use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
        $tractions = Traction::get();
        $facts = FactSheet::all();
        $faqs = Faq::get();
        $plans = InvestmentPlan::latest()->get();
        $setting = Setting::first();
        return view('frontend.home', compact('setting','plans','faqs','facts','tractions'));
    }
}


