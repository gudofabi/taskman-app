<?php

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function getTasks() {
        return $this->taskRepository->all();
    }

    public function createTask(array $param) {
        // Here you could add business logic before creating a task
        return $this->taskRepository->create($param);
    }

    public function updateTask($id, array $param) {
        $task = $this->taskRepository->findById($id);
        if (!$task) {
            throw new \Exception('Task not found.');
        }
        // Additional business logic could be added here before updating
        return $this->taskRepository->update($task, $param);
    }
}
