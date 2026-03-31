<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Banner;
use  App\Models\Traction;

class SettingsController extends Controller
{

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'points' => 'required|array',
            'points.*' => 'required|string',
            'button_text' => 'nullable|string|max:255',
        ]);

        $highlight = banner::first();
        $highlight->update([
            'title' => $request->title,
            'points' => $request->points,
            'button_text' => $request->button_text,
        ]);

        return back()->with('success', 'Investment banner highlight updated successfully!');
    }

}
