<?php

namespace App\Http\Services;

use App\Http\Services\Todo\TodoStoreServices;
use App\Http\Services\Todo\TodoUpdateService;
use Exception;

class TodoService {
    private array $tasks = [];

    public function __construct(
        array $tasks,
    ) {
        $index = 0;
        $this->tasks = array_map(function ($task) use (&$index) {
            return [
                'index' => $index++,
                'title' => $task,
                'status' => 'todo'
            ];
        }, $tasks);
    }
    
    /**
     * getTasks
     *
     * @return array
    */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * setTasks
     *
     * @param array $tasks
     * @return void
    */
    public function setTasks(array $tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * storeTask
     *
     * @param string $title
     * @throws Exception
     * @return array
    */
    public function storeTask(string $title): array
    {
        $todoStoreService = new TodoStoreServices();
        $this->tasks = $todoStoreService->store($this->getTasks(), $title);
        return end($this->tasks);
    }

    /**
     * getTask
     *
     * @param string $title
     * @throws Exception
     * @return array
    */
    public function getTask($index) {
        if (!isset($this->tasks[$index])) {
            throw new Exception('error');
        }
        return $this->tasks[$index];
    }
    
    /**
     * updateTask
     *
     * @param int $index
     * @param mixed $title
     * @param mixed $status
     * @return array
    */
    public function updateTask(int $index, mixed $title = null, mixed $status = null ): array
    {
        $taskUpdateService = new TodoUpdateService();
        $this->setTasks($taskUpdateService->action($this->getTasks(), $index, $title, $status));

        return $this->getTask($index);
    }

    /**
     * deleteTask
     *
     * @param int $index
     * @return bool
    */
    public function deleteTask(int $index): bool
    {
        if (!isset($this->tasks[$index])) {
            throw new Exception('error not found');
        }
        unset($this->tasks[$index]);
        return true;
    }
}