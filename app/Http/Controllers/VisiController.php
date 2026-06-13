<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function index()
    {
        $visi = Visi::first();
        return view('visi.index', compact('visi'));
    }

    public function create()
    {
        return view('visi.create');
    }

    public function store(Request $request)
    {
        $request->validate(['desc' => 'required']);
        Visi::create($request->only('desc'));

        return redirect()->route('visi.index')->with('success', 'Data visi berhasil disimpan.');
    }

    public function edit($id)
    {
        $visi = Visi::findOrFail($id);
        return view('visi.edit', compact('visi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['desc' => 'required']);
        $visi = Visi::findOrFail($id);
        $visi->update($request->only('desc'));

        return redirect()->route('visi.index')->with('success', 'Data visi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();

        return redirect()->route('visi.index')->with('success', 'Data visi berhasil dihapus.');
    }
}
