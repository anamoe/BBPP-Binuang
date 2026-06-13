<?php

namespace App\Http\Controllers;

use App\Models\UptExternal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UptExternalController extends Controller
{
    /**
     * Tampilkan semua data.
     */
    public function index()
    {
        $uptExternal = UptExternal::all();
        return view('upt_external.index', compact('uptExternal'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        return view('upt_external.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        $imagePath = $request->file('image')->store('upt_external', 'public');

        UptExternal::create([
            'image' => $imagePath,
            'link' => $request->link,
        ]);

        return redirect()->route('upt_external.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $uptExternal = UptExternal::findOrFail($id);
        return view('upt_external.edit', compact('uptExternal'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $uptExternal = UptExternal::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = ['link' => $request->link];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($uptExternal->image && Storage::disk('public')->exists($uptExternal->image)) {
                Storage::disk('public')->delete($uptExternal->image);
            }

            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('upt_external', 'public');
        }

        $uptExternal->update($data);

        return redirect()->route('upt_external.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $uptExternal = UptExternal::findOrFail($id);

        if ($uptExternal->image && Storage::disk('public')->exists($uptExternal->image)) {
            Storage::disk('public')->delete($uptExternal->image);
        }

        $uptExternal->delete();

        return redirect()->route('upt_external.index')->with('success', 'Data berhasil dihapus!');
    }
}
