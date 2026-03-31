<?php

namespace App\Http\Controllers\Backend;

use App\Models\FactSheet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactSheetController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'highlight_text' => 'required',
            'description' => 'required',
        ]);

        FactSheet::create($request->all());

        return redirect()->back()->with('success', 'Fact added!');
    }

    public function update(Request $request, FactSheet $factSheet)
    {
        $factSheet->update($request->all());

        return redirect()->back()->with('success', 'Fact Updated!');
    }

    public function destroy(FactSheet $factSheet)
    {
        $factSheet->delete();

        return redirect()->back()->with('success', 'Fact deleted!');
    }

}
