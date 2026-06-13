<?php

namespace App\Http\Controllers;

use App\Models\ProgramAnggaran;
use App\Models\JenisProgramAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramAnggaranController extends Controller
{
    public function index()
    {
        $programs = ProgramAnggaran::with('jenis')->get();
        return view('program_anggaran.index', compact('programs'));
    }

    public function create()
    {
        $jenis = JenisProgramAnggaran::all();
        return view('program_anggaran.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
            'jenis_program_anggaran_id' => 'required|exists:jenis_program_anggaran,id',
        ]);

        $filePath = $request->file('file')->store('program_anggaran', 'public');

        ProgramAnggaran::create([
            'name' => $request->name,
            'file' => $filePath,
            'jenis_program_anggaran_id' => $request->jenis_program_anggaran_id,
        ]);

        return redirect()->route('program_anggaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $programAnggaran = ProgramAnggaran::find($id);
        $jenis = JenisProgramAnggaran::all();
        return view('program_anggaran.edit', compact('programAnggaran', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $programAnggaran = ProgramAnggaran::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'jenis_program_anggaran_id' => 'required|exists:jenis_program_anggaran,id',
        ]);

        $data = [
            'name' => $request->name,
            'jenis_program_anggaran_id' => $request->jenis_program_anggaran_id,
        ];

        if ($request->hasFile('file')) {
            // hapus file lama
            if ($programAnggaran->file && Storage::disk('public')->exists($programAnggaran->file)) {
                Storage::disk('public')->delete($programAnggaran->file);
            }
            $data['file'] = $request->file('file')->store('program_anggaran', 'public');
        }

        $programAnggaran->update($data);

        return redirect()->route('program_anggaran.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $programAnggaran = ProgramAnggaran::find($id);

        if ($programAnggaran->file && Storage::disk('public')->exists($programAnggaran->file)) {
            Storage::disk('public')->delete($programAnggaran->file);
        }

        $programAnggaran->delete();
        return redirect()->route('program_anggaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
