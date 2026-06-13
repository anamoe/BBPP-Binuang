<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Tampilkan data organisasi.
     */
    public function index()
    {
        $organisasi = Organisasi::first(); // karena biasanya cuma 1 data deskripsi
        return view('organisasi.index', compact('organisasi'));
    }

    /**
     * Tampilkan form untuk membuat data baru.
     */
    public function create()
    {
        return view('organisasi.create');
    }

    /**
     * Simpan data organisasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required|string',
        ]);

        Organisasi::create([
            'desc' => $request->desc,
        ]);

        return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data organisasi.
     */
    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('organisasi.edit', compact('organisasi'));
    }

    /**
     * Update data organisasi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => 'required|string',
        ]);

        $organisasi = Organisasi::findOrFail($id);
        $organisasi->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil diperbarui.');
    }

    /**
     * Hapus data organisasi.
     */
    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil dihapus.');
    }
}
