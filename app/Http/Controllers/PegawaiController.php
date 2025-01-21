<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Menampilkan daftar pegawai
     */
    public function index(Request $request)
    {
        $bidangs = Bidang::all(); // Tambahkan ini untuk dropdown bidang

        $filters = $request->only(['search', 'bidang', 'status']);
        $pegawais = Pegawai::with('bidang')
            ->filter($filters)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.pegawai.index', compact('pegawais', 'bidangs'));

        // // Ambil daftar bidang untuk filter
        // $bidangs = Bidang::all();

        // Corrected view path
        return view('pages.pegawai.index', [
            'pegawais' => $pegawais,
            'bidangs' => $bidangs,
            'filters' => $filters,
            'title' => 'Manajemen Pegawai'
        ]);
    }

    /**
     * Menampilkan form tambah pegawai
     */
    public function create()
    {
        $bidangs = Bidang::all();
        return view('pages.pegawai.create', [
            'bidangs' => $bidangs,
            'title' => 'Tambah Pegawai Baru'
        ]);
    }

    /**
     * Proses penyimpanan pegawai baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = $this->validatePegawai($request);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses upload avatar
        $avatarPath = $this->handleAvatarUpload($request);

        // Simpan data pegawai
        $pegawai = Pegawai::create([
            'nip' => $request->nip, // Input manual
            'nama' => $request->nama,
            'email' => $request->email,
            'bidang_id' => $request->bidang_id,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status' => 'Aktif',
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'avatar' => $avatarPath
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil ditambahkan');
    }

    /**
     * Menampilkan detail pegawai
     */
    public function show($id)
    {
        $pegawai = Pegawai::with('bidang')->findOrFail($id);

        return view('pages.pegawai.show', [
            'pegawai' => $pegawai,
            'title' => 'Detail Pegawai: ' . $pegawai->nama
        ]);
    }

    /**
     * Menampilkan form edit pegawai
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $bidangs = Bidang::all();

        return view('pages.pegawai.edit', [
            'pegawai' => $pegawai,
            'bidangs' => $bidangs,
            'title' => 'Edit Pegawai: ' . $pegawai->nama
        ]);
    }

    /**
     * Proses pembaruan data pegawai
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Validasi input
        $validator = $this->validatePegawai($request, $pegawai->id);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses upload avatar
        $avatarPath = $this->handleAvatarUpload($request, $pegawai->avatar);

        // Update data pegawai
        $pegawai->update([
            'nip' => $request->nip, // Input manual
            'nama' => $request->nama,
            'email' => $request->email,
            'bidang_id' => $request->bidang_id,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'avatar' => $avatarPath
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil diperbarui');
    }

    /**
     * Menghapus pegawai
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Hapus avatar jika ada
        if ($pegawai->avatar) {
            Storage::disk('public')->delete($pegawai->avatar);
        }

        // Hapus pegawai
        $pegawai->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai berhasil dihapus');
    }

    /**
     * Validasi pegawai
     */
    private function validatePegawai(Request $request, $pegawaiId = null)
    {
        return Validator::make($request->all(), [
            'nip' => 'required|unique:pegawais,nip,' . $pegawaiId,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawais,email,' . $pegawaiId,
            'bidang_id' => 'required|exists:bidangs,id',
            'jabatan' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'no_telepon' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'avatar' => 'nullable|image|max:2048'
        ]);
    }

    /**
     * Handle avatar upload
     */
    private function handleAvatarUpload(Request $request, $oldAvatarPath = null)
    {
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($oldAvatarPath) {
                Storage::disk('public')->delete($oldAvatarPath);
            }
            return $request->file('avatar')->store('avatars', 'public');
        }
        return $oldAvatarPath; // Return old path if no new file is uploaded
    }
}
