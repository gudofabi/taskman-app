<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskService;
use App\Http\Resources\TaskResource;

class CompleteTaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }
    
    public function __invoke(Request $request, $id) {
        try {
            $task = $this->taskService->updateTask($id, $request->all());
            return response()->json(['task' => TaskResource::make($task)]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
