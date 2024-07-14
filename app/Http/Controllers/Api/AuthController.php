<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        // Cek apakah username dan password sesuai
        if ($credentials['username'] == 'admin' && $credentials['password'] == '10000') {
            // Simpan data login secara statis (gunakan session untuk menyimpan state login)
            session(['authenticated' => true, 'username' => $credentials['username']]);
            return response()->json(['success' => true, 'message' => 'Login berhasil']);
        }
        return response()->json(['success' => false, 'message' => 'Login gagal'], 401);
    }
}
