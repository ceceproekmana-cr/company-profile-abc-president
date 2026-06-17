<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

public function authenticate(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6'
    ],[
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 6 karakter'
    ]);

    $user = User::where(
        'email',
        $request->email
    )->first();

    if (!$user) {

        return back()
            ->with('error', 'Email tidak ditemukan')
            ->withInput();
    }

    if (!Hash::check(
        $request->password,
        $user->password
    )) {

        return back()
            ->with('error', 'Password salah')
            ->withInput();
    }

    session([
        'user_id' => $user->id,
        'user_name' => $user->name
    ]);

    return redirect('/admin/dashboard');
}

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}