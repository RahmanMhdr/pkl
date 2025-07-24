<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with('departemen')->get();
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        $departemens = Departemen::all();
        return view('karyawan.create', compact('departemens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:50',
            'tgl' => 'nullable|date',
            'departemen_id' => 'required|exists:departemens,id',
        ]);

        Karyawan::create($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit(Karyawan $karyawan)
    {
        $departemens = Departemen::all();
        return view('karyawan.edit', compact('karyawan', 'departemens'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:50',
            'tgl' => 'nullable|date',
            'departemen_id' => 'required|exists:departemens,id',
        ]);

        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete(); // jika pakai softDelete, ini akan soft delete
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
