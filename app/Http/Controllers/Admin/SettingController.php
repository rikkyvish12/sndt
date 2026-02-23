<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key|max:100',
            'value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('admin.settings.index')
                        ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'key' => 'required|string|unique:settings,key,' . $setting->id . '|max:100',
            'value' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('admin.settings.index')
                        ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')
                        ->with('success', 'Setting deleted successfully.');
    }
}
