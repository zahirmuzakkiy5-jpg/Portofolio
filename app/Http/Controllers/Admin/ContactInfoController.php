<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email'     => 'nullable|email',
            'whatsapp'  => 'nullable|string|max:20',
            'github'    => 'nullable|url',
            'linkedin'  => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $contactInfo = ContactInfo::first() ?? new ContactInfo();
        $contactInfo->fill($request->only('email', 'whatsapp', 'github', 'linkedin', 'instagram'));
        $contactInfo->save();

        return redirect()->route('admin.contact-info.edit')->with('success', 'Contact Info berhasil diupdate!');
    }
}