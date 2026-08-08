<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail; 
use Illuminate\Support\Facades\Mail; 

class ContactController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // 1. Simpan ke Database
        ContactMessage::create($validatedData);

        // 2. Kirim Notifikasi Email
        Mail::to('zahirmuzakkiy5@gmail.com')->send(
            new ContactMessageMail($request->name, $request->email, $request->message)
        );

        // 3. Redirect Kembali
        return back()->with('success', 'Pesan kamu berhasil dikirim!');
    }
}