<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository {
    protected $model;

    public function __construct(Task $model) {
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }

    public function paginate(int $perPage = 5) {
        return $this->model->orderBy('created_at', 'desc')->paginate(10);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function findById($id) {
        return $this->model->find($id);
    }

    public function update(Task $task, array $data) {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task) {
        $task->delete($task);
    }
}