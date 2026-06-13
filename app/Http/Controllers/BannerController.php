<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    // Form tambah
    public function create()
    {
        return view('banner.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'desc' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('banner', 'public');

        Banner::create([
            'image' => $imagePath,
            'desc' => $request->desc,
            'status' => $request->status,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner.edit', compact('banner'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|max:2048',
            'desc' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $data = [
            'desc' => $request->desc,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = $request->file('image')->store('banner', 'public');
        }

        $banner->update($data);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
