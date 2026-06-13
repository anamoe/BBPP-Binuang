<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $socialMedias = SocialMedia::all();
        return view('social_media.index', compact('socialMedias'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('social_media.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        SocialMedia::create([
            'link' => $request->link,
        ]);

        return redirect()->route('social_media.index')->with('success', 'Social Media berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('social_media.edit', compact('socialMedia'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->update([
            'link' => $request->link,
        ]);

        return redirect()->route('social_media.index')->with('success', 'Social Media berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        return redirect()->route('social_media.index')->with('success', 'Social Media berhasil dihapus.');
    }
}
