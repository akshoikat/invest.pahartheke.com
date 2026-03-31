<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Traction;

class TractionController extends Controller
{
   
    public function index(){

    }
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'highlight' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Traction::create($request->only(['icon', 'highlight', 'description']));

        return back()->with('success', 'Traction item created successfully.');
    }

    public function update(Request $request, Traction $traction)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'highlight' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $traction->update($request->only(['icon', 'highlight', 'description']));

        return back()->with('success', 'Traction item updated successfully.');
    }

    public function destroy(Traction $traction)
    {
        $traction->delete();
        return back()->with('success', 'Traction item deleted successfully.');
    }
}
