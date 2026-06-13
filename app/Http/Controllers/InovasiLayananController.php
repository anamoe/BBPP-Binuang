<?php

namespace App\Http\Controllers;

use App\Models\InovasiLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiLayananController extends Controller
{
    /**
     * Tampilkan semua data inovasi layanan.
     */
    public function index()
    {
        $inovasiLayanan = InovasiLayanan::all();
        return view('inovasi_layanan.index', compact('inovasiLayanan'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        return view('inovasi_layanan.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        $path = $request->file('image')->store('inovasi_layanan', 'public');

        InovasiLayanan::create([
            'title' => $request->title,
            'image' => $path,
            'link' => $request->link,
        ]);

        return redirect()->route('inovasi_layanan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit($id)
    {
        $inovasi_layanan = InovasiLayanan::find($id);
        return view('inovasi_layanan.edit', compact('inovasi_layanan'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $inovasi_layanan = InovasiLayanan::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'link' => $request->link,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($inovasi_layanan->image && Storage::disk('public')->exists($inovasi_layanan->image)) {
                Storage::disk('public')->delete($inovasi_layanan->image);
            }

            $data['image'] = $request->file('image')->store('inovasi_layanan', 'public');
        }

        $inovasi_layanan->update($data);

        return redirect()->route('inovasi_layanan.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $inovasi_layanan = InovasiLayanan::find($id);

        if ($inovasi_layanan->image && Storage::disk('public')->exists($inovasi_layanan->image)) {
            Storage::disk('public')->delete($inovasi_layanan->image);
        }

        $inovasi_layanan->delete();

        return redirect()->route('inovasi_layanan.index')->with('success', 'Data berhasil dihapus!');
    }
}
