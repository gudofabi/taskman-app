<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function index() {
        $tasks = $this->taskService->getTasks();
        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request) {
        $task = $this->taskService->createTask($request->all());
        return response()->json(['task' => $task]);
    }

    public function update($id, Request $request) {
        try {
            $task = $this->taskService->updateTask($id, $request->all());
            return response()->json(['task' => $task]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
