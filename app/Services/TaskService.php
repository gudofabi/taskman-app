<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function getTasks() {
        $tasks = $this->taskRepository->paginate();
        $tasks->load('priority');
        return $tasks;
    }

    public function getTask($id) {
        return $this->taskRepository->findById($id);
    }

    public function createTask(array $param) {
        // Here you could add business logic before creating a task
        $task = $this->taskRepository->create($param);
        $task->load('priority');
        return $task;
    }

    public function updateTask($id, array $param) {
        $task = $this->taskRepository->findById($id);
        if (!$task) {
            throw new \Exception('Task not found.');
        }
        // Additional business logic could be added here before updating
        return $this->taskRepository->update($task, $param);
    }

    public function deleteTask($id) {
        $task = $this->taskRepository->findById($id);
        if (!$task) {
            throw new \Exception('Task not found.');
        }

        return $this->taskRepository->delete($task);
    }
}
