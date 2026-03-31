<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\FactSheet;
use App\Models\Traction;
use App\Models\InvestmentPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class DashboardController extends Controller
{
    public function index()
    {
       
        
       
        return view('backend.dashboard');
    }


    // settings start
    public function edit()
    {
        $tractions = Traction::latest()->get();
        $facts = FactSheet::all();
        $faqs = Faq::get();
        $plans = InvestmentPlan::all();
        $setting = Setting::firstOrCreate(['id' => 1]);
        $defaultPoints = [
            'Halal Investment – Ethical, Shariah-compliant opportunities',
            'Safe Food Market Leader – Strong consumer trust & demand',
            'High Growth Potential – Up to 25% ROI on selected investments',
            'Sustainable & Zero-Emission Agro Processing Hub – The future of food production',
        ];
        $highlight = banner::firstOrCreate([], [
            'title' => 'Why Invest in Pahartheke?',
            'points' => $defaultPoints,
            'button_text' => 'Express Interest to Invest',
        ]);
        return view('backend.setting.index', compact('setting','highlight','plans','faqs','facts','tractions'));
    }




    public function update(Request $request){
            $request->validate([
                  'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                    'company_name' => 'nullable|string',
                    'company_description' => 'nullable|string',
                    'customer_care_phone_1' => 'nullable|string',
                    'customer_care_phone_2' => 'nullable|string',
                    'customer_care_email' => 'nullable|email',
                    'corporate_phone' => 'nullable|string',
                    'corporate_email' => 'nullable|email',
                    'investment_phone' => 'nullable|string',
                    'investment_email' => 'nullable|email',
                    'office_address' => 'nullable|string',
                    'general_email' => 'nullable|email',
                    'google_play_link' => 'nullable|url', 
            ]);

           
            $setting = Setting::first() ?? new Setting;

            // Handle logo upload if exists
            if ($request->hasFile('logo')) {
                
                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }

                $path = $request->file('logo')->store('logo', 'public');
                $setting->logo = $path;
            }

            // Update other fields
            $setting->company_name = $request->company_name;
            $setting->company_description = $request->company_description;
            $setting->customer_care_phone_1 = $request->customer_care_phone_1;
            $setting->customer_care_phone_2 = $request->customer_care_phone_2;
            $setting->customer_care_email = $request->customer_care_email;
            $setting->corporate_phone = $request->corporate_phone;
            $setting->corporate_email = $request->corporate_email;
            $setting->investment_phone = $request->investment_phone;
            $setting->investment_email = $request->investment_email;
            $setting->office_address = $request->office_address;
            $setting->general_email = $request->general_email;
            $setting->google_play_link = $request->google_play_link;


            $setting->save();

            return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    // settings end


    
}
