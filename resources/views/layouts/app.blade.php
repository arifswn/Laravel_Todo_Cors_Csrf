<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'App Todo') }}</title>
    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    {{-- external css --}}
    @vite('resources/css/app.css')

</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">Todo App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('todos.index') }}">Todos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light py-3 mt-auto">
        <div class="container d-flex justify-content-between">
            <span class="text-muted">&copy; 2024 Todo App - Cors &amp; CSRF. All Rights Reserved.</span>
            <span class="text-muted">by <a href="https://www.instagram.com/swn.setiawan/" target="_blank"
                    class="text-decoration-none">Arif
                    Setiawan</a>
            </span>
        </div>
    </footer>

    <button id="darkModeToggle" class="btn btn-toggle rounded-circle position-fixed bottom-0 end-0 m-3">
        <i class="fas fa-moon"></i>
    </button>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- font awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    {{-- external js --}}
    @vite('resources/js/app.js')

</body>

</html>
