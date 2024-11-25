<?php

namespace App\Http\Services\Todo;

use Exception;

class TodoStoreServices {

    /**
     * store
     *
     * @param array $taskList
     * @param string $title
     * @throws Exception
     * @return array
    */
    public function store(array $taskList, string $title): array
    {
        if (trim($title) === '') {
            throw new Exception('error title');
        }
        
        $task = [
            'index' => count($taskList) + 1,
            'title' => $title,
            'status' => 'todo'
        ];

        $taskList[] = $task;

        return $taskList;
    }
}