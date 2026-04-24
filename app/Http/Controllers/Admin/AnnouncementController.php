<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'nullable|url|max:255',
            'link_text' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'is_active' => $request->has('is_active') ? true : false,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $announcement = Announcement::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'nullable|url|max:255',
            'link_text' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
            'link' => $request->link,
            'link_text' => $request->link_text,
            'is_active' => $request->has('is_active') ? true : false,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')
                        ->with('success', 'Announcement deleted successfully.');
    }
}
