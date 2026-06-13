<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::first(); // hanya satu data seperti about
        return view('task.index', compact('task'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required',
        ]);

        Task::create([
            'desc' => $request->desc,
        ]);

        return redirect()->route('task.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desc' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('task.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Data berhasil dihapus!');
    }
}
