<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    // Menampilkan daftar riwayat cuti
    public function index()
    {
        $totalCuti = Cuti::count();
        $cutiDisetujui = Cuti::disetujui()->count();
        $cutiDitolak = Cuti::ditolak()->count();
        $cutiProses = Cuti::proses()->count();
        $user = Auth::user(); // Get the authenticated user

        return view('pages.cuti.index', compact(
            'totalCuti',
            'cutiDisetujui',
            'cutiDitolak',
            'cutiProses',
            'user' // Pass the user variable
        ));
    }

    // Menampilkan form untuk membuat pengajuan cuti baru
    public function create()
    {
        $pegawais = Pegawai::where('status', 'Aktif')->get();
        return view('pages.cuti.create', compact('pegawais'));
    }

    // Menyimpan pengajuan cuti baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jenis_cuti' => 'required|in:Cuti Tahunan,Cuti Besar,Cuti Khusus,Cuti Sakit,Cuti Melahirkan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|max:5120'
        ]);

        // Hitung jumlah hari
        $validatedData['jumlah_hari'] =
            \Carbon\Carbon::parse($request->tanggal_mulai)
            ->diffInDays(\Carbon\Carbon::parse($request->tanggal_selesai)) + 1;

        // Upload dokumen jika ada
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumen_cuti', $filename, 'public');
            $validatedData['dokumen_pendukung'] = $path;
        }

        Cuti::create($validatedData);

        return redirect()->route('cuti.index')
            ->with('success', 'Pengajuan cuti berhasil dibuat');
    }

    // Menampilkan detail pengajuan cuti
    public function show($id)
    {
        $cuti = Cuti::with('pegawai')->findOrFail($id);
        $user = Auth::user(); // Get the authenticated user

        return view('pages.cuti.show', compact('cuti', 'user')); // Pass the user variable
    }

    // Menampilkan form untuk mengedit pengajuan cuti
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $pegawais = Pegawai::where('status', 'Aktif')->get();
        $user = Auth::user(); // Get the authenticated user

        return view('pages.cuti.edit', compact('cuti', 'pegawais', 'user')); // Pass the user variable
    }

    // Memperbarui pengajuan cuti
    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        $validatedData = $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jenis_cuti' => 'required|in:Cuti Tahunan,Cuti Besar,Cuti Khusus,Cuti Sakit,Cuti Melahirkan',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|in:Proses,Disetujui,Ditolak',
            'dokumen_pendukung' => 'nullable|file|max:5120'
        ]);

        // Hitung jumlah hari
        $validatedData['jumlah_hari'] =
            Carbon::parse($request->tanggal_mulai)
            ->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

        // Upload dokumen jika ada
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('dokumen_cuti', $filename, 'public');
            $validatedData['dokumen_pendukung'] = $path;
        }

        $cuti->update($validatedData);

        return redirect()->route('cuti.index')
            ->with('success', 'Pengajuan cuti berhasil diperbarui');
    }

    // Menghapus pengajuan cuti
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil dihapus');
    }
}
