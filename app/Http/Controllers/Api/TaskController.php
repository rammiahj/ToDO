<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $req)
    {
        $q = Task::query();
        $status = $req->has('status') ? (int) $req->get('status') : 0;
        $q->where('status', $status);

        $tasks = $q->orderBy('time', 'desc')
            ->take(5)
            ->get();

        return response()->json($tasks);
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'time'    => 'nullable|date',   
        ]);

        $task = Task::create($data + ['status' => 0]);
        return response()->json($task, 201);
    }

    // Mark done (status -> 1)
    public function done(Task $task)
    {
        $task->update(['status' => 1]);
        return $task->fresh();
    }
    public function update(Request $req, Task $task)
    {
        $data = $req->validate([
            'title'   => 'sometimes|required|string|max:255',
            'content' => 'nullable|string',
            'status'  => 'nullable|integer|in:0,1',
            'time'    => 'nullable|date',
        ]);
        $task->update($data);
        return $task->fresh();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent();
    }
}
