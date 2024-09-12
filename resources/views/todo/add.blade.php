<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSRF Form</title>
    {{-- csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4><i class="fas fa-database"></i> Form Todo</h4>
                        </div>
                        <div class="card-body">
                            {{-- response --}}
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form id="todoForm" method="POST" role="form" action="{{ route('todo.store') }}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    {{-- hidden csrf token --}}
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <label for="name" col-form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                {{-- save --}}
                                <button type="submit" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus"></i>Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- bootstrap --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    {{-- font awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>
