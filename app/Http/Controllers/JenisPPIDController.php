<?php

namespace App\Http\Controllers;

use App\Models\JenisPpid;
use Illuminate\Http\Request;

class JenisPPIDController extends Controller
{
    public function index()
    {
        $jenis_ppid = JenisPpid::all();
        return view('jenis_ppid.index', compact('jenis_ppid'));
    }

    public function create()
    {
        return view('jenis_ppid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        JenisPpid::create($request->only('jenis'));

        return redirect()->route('jenis_ppid.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenisPpid = JenisPpid::find($id);
        return view('jenis_ppid.edit', compact('jenisPpid'));
    }

    public function update(Request $request, $id)
    {
        $jenisPpid = JenisPpid::find($id);

        $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        $jenisPpid->update($request->only('jenis'));

        return redirect()->route('jenis_ppid.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jenisPpid = JenisPpid::find($id);

        $jenisPpid->delete();

        return redirect()->route('jenis_ppid.index')->with('success', 'Data berhasil dihapus!');
    }
}
