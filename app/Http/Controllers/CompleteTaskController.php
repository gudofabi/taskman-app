<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class CompleteTaskController extends Controller
{
    public function __invoke(Request $request, Task $task) {
        $task->is_completed = $request->is_completed;
        $task->save();
        return TaskResource::make($task);
    }
}
