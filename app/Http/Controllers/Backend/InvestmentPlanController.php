<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;

class InvestmentPlanController extends Controller
{

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'details' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_apply' => 'nullable|string|max:100',
            'apply_link' => 'nullable|url',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            
        ]);

        $data = $request->all();

        foreach (['image_1', 'image_2', 'image_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('plans', 'public');
            }
        }

        InvestmentPlan::create($data);
        return back()->with('success', 'Investment plan added.');
    }

    public function update(Request $request, InvestmentPlan $investment_plan)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'details' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_apply' => 'nullable|string|max:100',
            'apply_link' => 'nullable|url',

            'image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        
        foreach (['image_1', 'image_2', 'image_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('plans', 'public');
            }
        }
       
        $investment_plan->update($data);
        return back()->with('success', 'Investment plan updated.');
    }

    public function destroy(InvestmentPlan $id)
    {
        $id->delete();
        return back()->with('success', 'Investment Plan deleted successfully.');
    }

}
