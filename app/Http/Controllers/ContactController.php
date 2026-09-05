<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:150',
            'company'         => 'nullable|string|max:200',
            'email'           => 'required|email|max:200',
            'phone'           => 'required|string|max:30',
            'product_interest'=> 'nullable|string|max:200',
            'quantity'        => 'nullable|string|max:100',
            'message'         => 'required|string|max:2000',
        ]);

        // TODO: Send email notification (Mail::to('sales@makatifoundry.com')->send(...))
        // For now, log and flash success message
        \Log::info('Quote Request Received', $validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you, ' . e($validated['name']) . '! Your inquiry has been received. Our sales team will contact you within 1–2 business days.');
    }
}
