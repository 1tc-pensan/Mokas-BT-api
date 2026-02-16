<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'státusz' => 'required|in:függőben,folyamatba,befejezett',
        ]);
        $task = task::create($validatedData);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = task::findorfail($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);

        }
        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $task = task::findorfail($id);
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'státusz' => 'required|in:függőben,folyamatba,befejezett',
        ]);
        $task->update($validatedData);
        return response()->json($task,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        task::destroy($id);
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
