@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Edit Todo</h5>
                    <a href="{{ route('todos.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $todo->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required>{{ $todo->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="completed">Status Completed (<span class="text-danger">Centang jika
                                    selesai</span>)</label>
                            <div class="form-check">
                                <input type="hidden" name="completed" value="0">
                                <!-- Default value 0 jika tidak dicentang -->
                                <input type="checkbox" class="form-check-input" name="completed" id="completed"
                                    value="1" {{ $todo->completed == 1 ? 'checked' : '' }}>
                                <span class="form-check-label">Selesai</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
