<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:todos,title|max:255',
            'description' => 'nullable|max:500',
            'completed' => 'required|in:0,1',
        ], [
            'title.required' => 'Judul wajib diisi!',
            'title.unique' => 'Judul ini sudah ada, harap gunakan judul yang lain.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'completed.required' => 'Status completed wajib diisi!',
            'completed.in' => 'Status completed harus bernilai 0 (belum selesai) atau 1 (selesai).'
        ]);

        // Menyimpan todo ke dalam database
        Todo::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan.');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|unique:todos,title,' . $todo->id . '|max:255', // validasi title tidak boleh kosong, unik kecuali dirinya sendiri
            'description' => 'nullable|max:500',
            'completed' => 'required|in:0,1',
        ], [
            'title.required' => 'Judul wajib diisi!',
            'title.unique' => 'Judul ini sudah digunakan, gunakan judul lain.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'completed.required' => 'Status completed wajib diisi!',
            'completed.in' => 'Status completed harus bernilai 0 (belum selesai) atau 1 (selesai).',
        ]);

        // Update todo ke dalam database
        $todo->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('todos.index')->with('success', 'Todo berhasil diperbarui.');
    }

    // Menghapus Todo dari database
    public function destroy(Todo $todo)
    {
        // Hapus todo dari database
        $todo->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus.');
    }
}
