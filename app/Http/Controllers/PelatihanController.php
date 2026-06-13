<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pegawai;
use App\Models\Keahlian;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::with(['pegawai', 'keahlian'])->get();
        return view('pelatihan.index', compact('pelatihans'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        $keahlians = Keahlian::all();
        return view('pelatihan.create', compact('pegawais', 'keahlians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'keahlian_id' => 'required|exists:keahlian,id',
        ]);

        Pelatihan::create($request->all());

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelatihan = Pelatihan::find($id);
        $pegawais = Pegawai::all();
        $keahlians = Keahlian::all();
        return view('pelatihan.edit', compact('pelatihan', 'pegawais', 'keahlians'));
    }

    public function update(Request $request, $id)
    {
        $pelatihan = Pelatihan::find($id);

        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'keahlian_id' => 'required|exists:keahlian,id',
        ]);

        $pelatihan->update($request->all());

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pelatihan = Pelatihan::find($id);

        $pelatihan->delete();
        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil dihapus!');
    }
}
