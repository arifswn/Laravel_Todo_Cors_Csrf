<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function indexTodo()
    {
        $todo = [
            ['id' => 1, 'name' => 'Belajar Laravel', 'completed' => true],
            ['id' => 2, 'name' => 'Belajar Vue.js', 'completed' => false],
            ['id' => 3, 'name' => 'Belajar React.js', 'completed' => false],
        ];

        return response()->json($todo);
    }

    public function storeTodo(Request $request)
    {
        return response()->json([
            'message' => 'Todo created successfully. CSRF token is valid.',
            'name' => $request->name,
        ]);
    }
}
