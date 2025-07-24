<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        return view('proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        Proyek::create($request->only(['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']));

        return redirect()->route('proyek.index')->with('success', 'Proyek ditambahkan.');
    }

    public function edit(Proyek $proyek)
    {
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $proyek->update($request->only(['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']));

        return redirect()->route('proyek.index')->with('success', 'Proyek diperbarui.');
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek dihapus.');
    }
}
