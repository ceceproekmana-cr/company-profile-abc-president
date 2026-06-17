<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        ContactMessage::create([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message'   => $request->message,
        ]);

        return back()->with(
            'success',
            'Pesan berhasil dikirim'
        );
    }
}