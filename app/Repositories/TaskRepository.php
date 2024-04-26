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
}