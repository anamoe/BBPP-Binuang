<?php

namespace App\Http\Controllers;

use App\Models\SkemaSertifikasi;
use App\Models\Keahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkemaSertifikasiController extends Controller
{
    public function index()
    {
        $skemas = SkemaSertifikasi::with('keahlian')->get();
        return view('skema_sertifikasi.index', compact('skemas'));
    }

    public function create()
    {
        $keahlians = Keahlian::all();
        return view('skema_sertifikasi.create', compact('keahlians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'nullable|string',
            'keahlian_id' => 'required|exists:keahlian,id',
        ]);

        $imagePath = $request->file('image')->store('skema_sertifikasi', 'public');

        SkemaSertifikasi::create([
            'image' => $imagePath,
            'desc' => $request->desc,
            'keahlian_id' => $request->keahlian_id,
        ]);

        return redirect()->route('skema_sertifikasi.index')->with('success', 'Skema Sertifikasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skemaSertifikasi = SkemaSertifikasi::find($id);
        $keahlians = Keahlian::all();
        return view('skema_sertifikasi.edit', compact('skemaSertifikasi', 'keahlians'));
    }

    public function update(Request $request,$id)
    {
        $skemaSertifikasi = SkemaSertifikasi::find($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'nullable|string',
            'keahlian_id' => 'required|exists:keahlian,id',
        ]);

        if ($request->hasFile('image')) {
            if ($skemaSertifikasi->image) {
                Storage::disk('public')->delete($skemaSertifikasi->image);
            }
            $skemaSertifikasi->image = $request->file('image')->store('skema_sertifikasi', 'public');
        }

        $skemaSertifikasi->desc = $request->desc;
        $skemaSertifikasi->keahlian_id = $request->keahlian_id;
        $skemaSertifikasi->save();

        return redirect()->route('skema_sertifikasi.index')->with('success', 'Skema Sertifikasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $skemaSertifikasi = SkemaSertifikasi::find($id);

        if ($skemaSertifikasi->image) {
            Storage::disk('public')->delete($skemaSertifikasi->image);
        }
        $skemaSertifikasi->delete();

        return redirect()->route('skema_sertifikasi.index')->with('success', 'Skema Sertifikasi berhasil dihapus!');
    }
}
