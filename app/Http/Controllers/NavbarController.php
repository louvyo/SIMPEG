<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data pengguna yang login
        return view('components.navbar', compact('user')); // Kirim data ke view
    }
}
