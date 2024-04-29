<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;

use App\Http\Requests\Task\StoreRequest as TaskStoreRequest;
use App\Http\Requests\Task\UpdateRequest as TaskUpdateRequest;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function index() {
        $tasks = $this->taskService->getTasks();
        return response()->json([
            'message' => 'Successfuly get the data.',
            'tasks' => new TaskCollection($tasks)
        ]);
    }

    public function show($id) {
        $task = $this->taskService->getTask($id);
        return response()->json([
            'message' => 'Successfully get the data.',
            'task' => TaskResource::make($task)
        ]);
    }

    public function store(TaskStoreRequest $request) {
        $task = $this->taskService->createTask($request->all());
        return response()->json(['task' => TaskResource::make($task)]);
    }

    public function update($id, TaskUpdateRequest $request) {
        try {
            $task = $this->taskService->updateTask($id, $request->all());
            return response()->json(['task' => TaskResource::make($task)]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function destroy($id) {
        $task = $this->taskService->deleteTask($id);
        return response()->json([
            'message' => 'Successfully delete the data.'
        ]);
    }
}
