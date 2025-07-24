<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        Departemen::create($validated);

        return redirect()->route('departemen.index')->with('success', 'Departemen ditambahkan.');
    }

    public function edit(Departemen $departemen)
    {
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        $departemen->update($validated);

        return redirect()->route('departemen.index')->with('success', 'Departemen diperbarui.');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();

        return redirect()->route('departemen.index')->with('success', 'Departemen dihapus.');
    }
}
