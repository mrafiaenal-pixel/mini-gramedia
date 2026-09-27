<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // Request -> mengambil value data: bisa dari input atau url
    public function register(Request $request)
    {
        // validasi
        // argumen wajib
        $validasiData = $request->validate([
            // 'nama_input' => ['jenis_validasi']
            'name' => ['required', 'min:3'], // 'name' harus sama dengan name=''
            // unique:table,email = data email tidak boleh duplikat
            'email' => ['required', 'email', 'unique:users,email', 'email:rfc,dns'],
            // untuk mengecek apakah password sudah pernah bocor di internet atau belum, jika sudah maka akan menolak password tersebut
            'password' => ['required', 'min:8', 'max:10', Password::min(8)->max(10)->uncompromised(), 'confirmed']
        ], [
            // teks err yang bakal muncul kalau validasi gagal
            // 'nama_input.jenis_validasi' => 'pesan
            // argumen 2
            'name.required' => 'Nama lengkap harus diisi',
            'name.min' => 'Nama lengkap harus diisi minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email harus diisi dengan data yang belum terdaftar',
            'password.unique' => 'Password harus diisi',
            'password.min' => 'Password harus diisi minimal 8 karakter',
            'password.max' => 'Password harus diisi hanya sampai 10 karakter',
            'password.confirmed' => 'Password harus sama dengan konfirmasi password yang diberikan '

        ]);
        $createAkun = User::create([
            'name' => $validasiData['name'],
            'email' => $validasiData['email'],
            'password' => Hash::make($validasiData['password']) // untuk mengubah password menjadi hash/enkripsi
        ]);
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silahkan login');
    }
    public function login(Request $request)
    {
        $validasiData = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi'
        ]);
        $auth = $request->except('_token');

        // $checkout = Auth::attempt($auth); // ada dua fungsi akan mengecek pasangan email dan password, jika cocok maka akan login dan return true, jika tidak cocok maka return false
        // if ($checkout) {
        //     // jika berhasil login
        //     $request->session()->regenerate(); // untuk menghindari session fixation, yaitu session yang sama digunakan oleh user lain // untuk menghindari session fixation, yaitu session yang sama digunakan oleh user lain\
        //     return redirect()->route('home')->with('success', 'Selamat datang ' . Auth::user()->name);
        // } else {
        //     // jika gagal login
        //     return redirect()->route('login')->with('error', 'Email atau password salah')->withInput();
        // }

        if (Auth::attempt($validasiData)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang ' . Auth::user()->name);
            } else {
                return redirect()->route('home')->with('success', 'Selamat datang ' . Auth::user()->name);
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah')->withInput();
        }
    }
    public function logout($request)
    {
        Auth::logout();
        // mmbuat ssession baru untuk user yang baru login, agar tidak bisa menggunakan session lama
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Berhasil logout');
    }
}
