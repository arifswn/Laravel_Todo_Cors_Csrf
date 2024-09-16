<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    // Get all todos
    public function index()
    {
        $todos = Todo::all();
        return response()->json(['code' => 200, 'message' => 'Success', 'data' => $todos]);
    }

    // Get a single todo
    public function show($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['code' => 404, 'message' => 'Todo not found'], 404);
        }

        return response()->json(['code' => 200, 'message' => 'Success', 'data' => $todo]);
    }

    // Create a new todo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'completed' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $todo = Todo::create($request->all());
        return response()->json([
            'code' => 201,
            'message' => 'Todo created successfully.',
            'todo' => $todo,
        ], 201);
    }

    // Update an existing todo
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'completed' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['code' => 404, 'message' => 'Todo not found'], 404);
        }

        $todo->update($request->all());
        return response()->json([
            'code' => 200,
            'message' => 'Todo updated successfully.',
            'todo' => $todo,
        ]);
    }

    // Delete a todo
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (!$todo) {
            return response()->json(['code' => 404, 'message' => 'Todo not found'], 404);
        }

        $todo->delete();
        return response()->json(['code' => 200, 'message' => 'Todo deleted successfully.']);
    }
}
