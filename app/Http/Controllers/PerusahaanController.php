<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $perusahaans = Perusahaan::all();
        return view('perusahaan.index', compact('perusahaans'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('perusahaan.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'jabatan' => 'required',
            'tgl' => 'required|date',
        ]);

        Perusahaan::create($request->only(['nama', 'jk', 'alamat', 'jabatan', 'tgl']));

        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.edit', compact('perusahaan'));
    }

    // Simpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'jabatan' => 'required',
            'tgl' => 'required|date',
        ]);

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update($request->only(['nama', 'jk', 'alamat', 'jabatan', 'tgl']));

        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
