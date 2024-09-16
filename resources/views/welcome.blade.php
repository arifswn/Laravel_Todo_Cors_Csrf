@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Selamat Datang</h1>
        <p class="lead">Aplikasi Todo App</p>
        <span>Materi Pembelajaran Cors &amp; CSRF pada Laravel 10 - Hacktiv8</span>
        <hr class="my-4">
        <p>Mulai mengelola daftar Todo Anda dengan fitur CRUD sederhana.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('todos.index') }}" role="button"><i class="fas fa-tasks"></i> Daftar
            Todo</a>
    </div>
@endsection
