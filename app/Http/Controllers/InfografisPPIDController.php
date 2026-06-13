<?php

namespace App\Http\Controllers;

use App\Models\InfografisPPID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfografisPPIDController extends Controller
{
    public function index()
    {
        $infografis = InfografisPPID::all();
        return view('infografis_ppid.index', compact('infografis'));
    }

    public function create()
    {
        return view('infografis_ppid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filePath = $request->file('image')->store('infografis_ppid', 'public');

        InfografisPPID::create([
            'image' => $filePath,
        ]);

        return redirect()->route('infografis_ppid.index')->with('success', 'Infografis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $infografisPpid = InfografisPPID::find($id);
        return view('infografis_ppid.edit', compact('infografisPpid'));
    }

    public function update(Request $request, $id)
    {
        $infografisPpid = InfografisPPID::find($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($infografisPpid->image && Storage::disk('public')->exists($infografisPpid->image)) {
                Storage::disk('public')->delete($infografisPpid->image);
            }
            $infografisPpid->image = $request->file('image')->store('infografis_ppid', 'public');
        }

        $infografisPpid->save();

        return redirect()->route('infografis_ppid.index')->with('success', 'Infografis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $infografisPpid = InfografisPPID::find($id);
        if ($infografisPpid->image && Storage::disk('public')->exists($infografisPpid->image)) {
            Storage::disk('public')->delete($infografisPpid->image);
        }

        $infografisPpid->delete();

        return redirect()->route('infografis_ppid.index')->with('success', 'Infografis berhasil dihapus!');
    }
}
