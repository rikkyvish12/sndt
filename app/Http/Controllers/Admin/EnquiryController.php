<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries.
     */
    public function index(Request $request)
    {
        $query = Enquiry::query();

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Search by name, phone, or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $enquiries = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.enquiries.index', compact('enquiries'));
    }

    /**
     * Show the form for editing the specified enquiry.
     */
    public function edit($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        return view('admin.enquiries.edit', compact('enquiry'));
    }

    /**
     * Update the specified enquiry in storage.
     */
    public function update(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,resolved',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $enquiry->update($validated);

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry updated successfully!');
    }

    /**
     * Remove the specified enquiry from storage.
     */
    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted successfully!');
    }
}
