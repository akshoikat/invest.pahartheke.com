<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.setting.tabs.Banner', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'points' => 'nullable|array',
            'points.*' => 'string',
            'button_text' => 'nullable|string|max:255',
        ]);

        Banner::create($validated);

        return redirect()->route('banners')->with('success', 'Banner created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'points' => 'nullable|array',
            'points.*' => 'string',
            'button_text' => 'nullable|string|max:255',
        ]);

        $banner->update($validated);

        return redirect()->route('backend.setting.tabs.Banner')->with('success', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banners.index')
                         ->with('success', 'Banner deleted successfully');
    }
}






// api
// <?php

// namespace App\Http\Controllers;

// use App\Models\Banner;
// use Illuminate\Http\Request;

// class BannerController extends Controller
// {
//     /**
//      * Display a listing of banners
//      */
//     public function index()
//     {
//         $banners = Banner::latest()->get();
//         return response()->json($banners);
//     }

//     /**
//      * Store a newly created banner
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'title' => 'required|string|max:255',
//             'points' => 'nullable|array',
//             'points.*' => 'string',
//             'button_text' => 'nullable|string|max:255',
//         ]);

//         $banner = Banner::create($validated);

//         return response()->json([
//             'message' => 'Banner created successfully',
//             'data' => $banner
//         ], 201);
//     }

//     /**
//      * Display a single banner
//      */
//     public function show($id)
//     {
//         $banner = Banner::findOrFail($id);
//         return response()->json($banner);
//     }

//     /**
//      * Update the specified banner
//      */
//     public function update(Request $request, $id)
//     {
//         $banner = Banner::findOrFail($id);

//         $validated = $request->validate([
//             'title' => 'sometimes|required|string|max:255',
//             'points' => 'nullable|array',
//             'points.*' => 'string',
//             'button_text' => 'nullable|string|max:255',
//         ]);

//         $banner->update($validated);

//         return response()->json([
//             'message' => 'Banner updated successfully',
//             'data' => $banner
//         ]);
//     }

//     /**
//      * Remove the specified banner
//      */
//     public function destroy($id)
//     {
//         $banner = Banner::findOrFail($id);
//         $banner->delete();

//         return response()->json([
//             'message' => 'Banner deleted successfully'
//         ]);
//     }
// }