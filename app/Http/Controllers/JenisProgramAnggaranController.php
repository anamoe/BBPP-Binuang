<?php

namespace App\Http\Controllers;

use App\Models\JenisProgramAnggaran;
use Illuminate\Http\Request;

class JenisProgramAnggaranController extends Controller
{
    public function index()
    {
        $data = JenisProgramAnggaran::all();
        return view('jenis_program_anggaran.index', compact('data'));
    }

    public function create()
    {
        return view('jenis_program_anggaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        JenisProgramAnggaran::create($request->all());

        return redirect()->route('jenis_program_anggaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenisProgramAnggaran = JenisProgramAnggaran::find($id);
        return view('jenis_program_anggaran.edit', compact('jenisProgramAnggaran'));
    }

    public function update(Request $request, $id)
    {
        $jenisProgramAnggaran = JenisProgramAnggaran::find($id);

        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        $jenisProgramAnggaran->update($request->all());

        return redirect()->route('jenis_program_anggaran.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jenisProgramAnggaran = JenisProgramAnggaran::find($id);
        $jenisProgramAnggaran->delete();
        return redirect()->route('jenis_program_anggaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
