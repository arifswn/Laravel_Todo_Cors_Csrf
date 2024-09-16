@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Daftar Todo</h5>
                    <a href="{{ route('todos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Status Completed</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($todos as $todo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>
                                            @if ($todo->completed == 0)
                                                <span class="badge bg-danger">Not Completed</span>
                                            @else
                                                <span class="badge bg-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-edit"></i> Edit</a>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="fas fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
