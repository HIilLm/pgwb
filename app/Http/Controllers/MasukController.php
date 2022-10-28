<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function login()
    {
        return view('perloginan_duniawi.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard/siswa');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        return view('perloginan_duniawi.register');
    }

    public function buat(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
        ];
        $validated = $request->validate([
            "nama_proyek" => "required|min:2",
            "id_siswa" => "required",
            "tanggal" => "required",
            "deskripsi" => "required",
            "foto" => "required|image|file",
        ],$message);
        User::create($validated);
        // Alert::success('Success', 'Successfully add new data');
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
