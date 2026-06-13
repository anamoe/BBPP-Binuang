<?php

namespace App\Http\Controllers;

use App\Models\DokumenPpid;
use App\Models\JenisPpid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenPPIDController extends Controller
{
    public function index()
    {
        $dokumen = DokumenPpid::with('jenis')->get();
        return view('dokumen_ppid.index', compact('dokumen'));
    }

    public function create()
    {
        $jenis_ppid = JenisPpid::all();
        return view('dokumen_ppid.create', compact('jenis_ppid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
            'jenis_ppid_id' => 'required|exists:jenis_ppid,id',
        ]);

        $filePath = $request->file('file')->store('dokumen_ppid', 'public');

        DokumenPpid::create([
            'name' => $request->name,
            'file' => $filePath,
            'jenis_ppid_id' => $request->jenis_ppid_id,
        ]);

        return redirect()->route('dokumen_ppid.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokumenPpid = DokumenPpid::find($id);
        $jenis_ppid = JenisPpid::all();
        return view('dokumen_ppid.edit', compact('dokumenPpid', 'jenis_ppid'));
    }

    public function update(Request $request, $id)
    {
        $dokumenPpid = DokumenPpid::find($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
            'jenis_ppid_id' => 'required|exists:jenis_ppid,id',
        ]);

        $data = [
            'name' => $request->name,
            'jenis_ppid_id' => $request->jenis_ppid_id,
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($dokumenPpid->file && Storage::disk('public')->exists($dokumenPpid->file)) {
                Storage::disk('public')->delete($dokumenPpid->file);
            }
            $data['file'] = $request->file('file')->store('dokumen_ppid', 'public');
        }

        $dokumenPpid->update($data);

        return redirect()->route('dokumen_ppid.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumenPpid = DokumenPpid::find($id);

        if ($dokumenPpid->file && Storage::disk('public')->exists($dokumenPpid->file)) {
            Storage::disk('public')->delete($dokumenPpid->file);
        }

        $dokumenPpid->delete();

        return redirect()->route('dokumen_ppid.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
