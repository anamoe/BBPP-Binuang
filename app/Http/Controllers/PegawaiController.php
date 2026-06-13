<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Tampilkan daftar pegawai
     */
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Form tambah pegawai
     */
    public function create()
    {
        $users = User::all();
        return view('pegawai.create', compact('users'));
    }

    /**
     * Simpan data pegawai
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nip' => 'required|string|max:50',
            'position' => 'required|string|max:255',
            'rank' => 'required|string|max:100',
            'gol' => 'required|string|max:50',
            'no_wa' => 'required|string|max:20',
            'unit_kerja' => 'nullable|string|max:255',
            'ttdx' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            $validate['image'] = $request->file('image')->store('pegawai', 'public');
        }

        Pegawai::create($validate);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    /**
     * Form edit pegawai
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $users = User::all();
        return view('pegawai.edit', compact('pegawai', 'users'));
    }

    /**
     * Update pegawai
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nip' => 'required|string|max:50',
            'position' => 'required|string|max:255',
            'rank' => 'required|string|max:100',
            'gol' => 'required|string|max:50',
            'no_wa' => 'required|string|max:20',
            'unit_kerja' => 'nullable|string|max:255',
            'ttdx' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            if ($pegawai->image) {
                Storage::disk('public')->delete($pegawai->image);
            }
            $validate['image'] = $request->file('image')->store('pegawai', 'public');
        }

        $pegawai->update($validate);
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui!');
    }

    /**
     * Hapus pegawai
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai->image) {
            Storage::disk('public')->delete($pegawai->image);
        }
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
