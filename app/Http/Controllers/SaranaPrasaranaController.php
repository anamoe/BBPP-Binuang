<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaPrasaranaController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $items = SaranaPrasarana::all();
        return view('sarana_prasarana.index', compact('items'));
    }

    // Form create
    public function create()
    {
        return view('sarana_prasarana.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'nullable|string|max:100',
            'wa' => 'nullable|string|max:20',
            'form_pemesanan' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        // Upload file
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('sarana_prasarana', 'public');
        }

        SaranaPrasarana::create($validated);

        return redirect()->route('sarana_prasarana.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $item = SaranaPrasarana::findOrFail($id);
        return view('sarana_prasarana.edit', compact('item'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'nullable|string|max:100',
            'wa' => 'nullable|string|max:20',
            'form_pemesanan' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        $item = SaranaPrasarana::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('sarana_prasarana', 'public');
        }

        $item->update($validated);

        return redirect()->route('sarana_prasarana.index')->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy($id)
    {
        $item = SaranaPrasarana::findOrFail($id);

        // Hapus file gambar jika ada
        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('sarana_prasarana.index')->with('success', 'Data berhasil dihapus.');
    }
}
