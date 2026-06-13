<?php

namespace App\Http\Controllers;

use App\Models\JadwalAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalAgendaController extends Controller
{
    public function index()
    {
        $agendas = JadwalAgenda::orderBy('start_date', 'desc')->get();
        return view('jadwal_agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('jadwal_agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'agenda_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('jadwal_agenda', 'public');
        }

        JadwalAgenda::create($data);

        return redirect()->route('agenda_kegiatan.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jadwal_agenda = JadwalAgenda::find($id);
        return view('jadwal_agenda.edit', compact('jadwal_agenda'));
    }

    public function update(Request $request, $id)
    {
        $jadwal_agenda = JadwalAgenda::find($id);

        $request->validate([
            'agenda_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($jadwal_agenda->image) {
                Storage::disk('public')->delete($jadwal_agenda->image);
            }
            $data['image'] = $request->file('image')->store('jadwal_agenda', 'public');
        }

        $jadwal_agenda->update($data);

        return redirect()->route('agenda_kegiatan.index')->with('success', 'Agenda berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jadwal_agenda = JadwalAgenda::find($id);

        if ($jadwal_agenda->image) {
            Storage::disk('public')->delete($jadwal_agenda->image);
        }

        $jadwal_agenda->delete();

        return redirect()->route('agenda_kegiatan.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
