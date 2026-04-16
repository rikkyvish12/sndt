<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Store a new enquiry from the chatbot form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        $validated['status'] = Enquiry::STATUS_NEW;

        Enquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your enquiry has been submitted successfully. We will contact you soon.',
        ]);
    }
}
