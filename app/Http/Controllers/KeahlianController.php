<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    public function index()
    {
        $keahlians = Keahlian::all();
        return view('keahlian.index', compact('keahlians'));
    }

    public function create()
    {
        return view('keahlian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keahlian_name' => 'required|string|max:255',
        ]);

        Keahlian::create($request->all());

        return redirect()->route('keahlian.index')->with('success', 'Keahlian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $keahlian = Keahlian::find($id);
        return view('keahlian.edit', compact('keahlian'));
    }

    public function update(Request $request, $id)
    {
        $keahlian = Keahlian::find($id);

        $request->validate([
            'keahlian_name' => 'required|string|max:255',
        ]);

        $keahlian->update($request->all());

        return redirect()->route('keahlian.index')->with('success', 'Keahlian berhasil diupdate!');
    }

    public function destroy($id)
    {
        $keahlian = Keahlian::find($id);
        $keahlian->delete();
        return redirect()->route('keahlian.index')->with('success', 'Keahlian berhasil dihapus!');
    }
}
