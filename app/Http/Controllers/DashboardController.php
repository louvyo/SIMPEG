<?php
namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Pegawai::count();
        $pegawaiAktif = Pegawai::where('status', 'Aktif')->count();

        return view('pages.dashboard', [
            'totalPegawai' => $totalPegawai,
            'pegawaiAktif' => $pegawaiAktif,
            'user' => Auth::user()
        ]);
    }
}